<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'customer_id' => 2,
            'subject' => 'Bagaimana cara beli buku?',
            'message' => 'Saya tidak tahu bagaimana caranya membeli buku di website BookStore ini.'
        ]);
    }
}
