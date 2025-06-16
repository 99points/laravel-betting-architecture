# Laravel Betting Architecture Sample

## 🧩 About Project

A simplified Laravel-based architecture demonstrating key design patterns used in high-performance betting and gaming platforms.

### ✅ Key Features

- ⚙️ Modular service-based structure  
- 🔁 REST APIs for wallet transactions  
- 🔒 Redis-backed locking for concurrency control  
- 📩 Webhook handling with idempotency protection  
- 🛡️ Role-based access control (RBAC) using Spatie  
- ⚡ Queueless real-time processing (synchronous transactions)  
- 📝 Logging and audit trails for critical actions  

## 🚀 Getting Started

### 1. Clone the repo
```bash
git clone https://github.com/your-username/laravel-betting-architecture.git
cd laravel-betting-architecture
```

### 2. Install dependencies
```bash
composer install
```

### 3. Set up environment
```bash
cp .env.example .env
php artisan key:generate
```
Update your `.env` file with your MySQL and Redis credentials.

### 4. Run migrations
```bash
php artisan migrate
```

### 5. Run the app
```bash
php artisan serve
```

## 📬 API Endpoints (Sample)

- `POST /api/wallet/debit` – Debit user wallet with Redis locking & idempotency  
- `POST /api/webhook/provider-x` – Handle external transaction callbacks  

## 🧪 Test Cases

Use Postman or cURL to simulate wallet transactions and webhook callbacks. Each critical operation logs output and respects idempotent logic.

## 🔐 Roles and Permissions

RBAC powered by [Spatie Laravel Permission](https://github.com/spatie/laravel-permission). Roles like `admin`, `operations`, and `reporting` can be assigned and scoped to API actions.

## 🧰 Tech Stack

- Laravel 10+  
- MySQL  
- Redis  
- PHP 8.1+  
- Spatie Permissions  
- REST APIs + Laravel Routing  
- Native Laravel Logging  

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Author

Developed by [Zeeshan Rasool](https://github.com/99points)
