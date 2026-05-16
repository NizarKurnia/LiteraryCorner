<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        Cart::create([
            'customer_id' => 2,
            'book_id' => 5,
            'quantity' => 2,
            'total_price' => 200000.00,
        ]);

        Cart::create([
            'customer_id' => 2,
            'book_id' => 3,
            'quantity' => 2,
            'total_price' => 120000.00,
        ]);
    }
}
