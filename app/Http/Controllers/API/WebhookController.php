<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handleProviderCallback(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        if (Transaction::where('external_txn_id', $request->transaction_id)->exists()) {
            return response()->json(['status' => 'duplicate']);
        }

        // Process the callback synchronously and atomically...
        Log::info('Webhook received', $request->all());

        return response()->json(['status' => 'received']);
    }

}
