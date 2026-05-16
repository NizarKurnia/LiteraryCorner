<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'order_number' => 'ORD-0001',
            'customer_id' => 2,
            'book_id' => 1,
            'quantity' => 2,
            'total_amount' => 170000.00,
            'payment_method' => 'Cash on Delivery',
            'payment_status' => 'Cancelled',
        ]);
        Transaction::create([
            'order_number' => 'ORD-0002',
            'customer_id' => 2,
            'book_id' => 2,
            'quantity' => 1,
            'total_amount' => 95000.00,
            'payment_method' => 'E-Wallet',
            'payment_status' => 'Pending',
        ]);
    }
}
