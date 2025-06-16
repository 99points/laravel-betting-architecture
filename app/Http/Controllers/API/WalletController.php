<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function debit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'idempotency_key' => 'required|string',
        ]);

        $user = auth()->user();
        $lockKey = 'wallet:lock:' . $user->id;

        // Prevent double-spending with Redis Lock
        if (!Redis::set($lockKey, 1, 'NX', 'EX', 5)) {
            return response()->json(['error' => 'Wallet is being used'], 429);
        }

        try {
            DB::transaction(function () use ($user, $request) {
                $wallet = Wallet::where('user_id', $user->id)->lockForUpdate()->first();

                if (Transaction::where('idempotency_key', $request->idempotency_key)->exists()) {
                    throw new Exception('Duplicate transaction');
                }

                if ($wallet->balance < $request->amount) {
                    throw new Exception('Insufficient funds');
                }

                $wallet->balance -= $request->amount;
                $wallet->save();

                Transaction::create([
                    'user_id' => $user->id,
                    'amount' => $request->amount,
                    'type' => 'debit',
                    'idempotency_key' => $request->idempotency_key,
                ]);
            });

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } finally {
            Redis::del($lockKey);
        }
    }

}
