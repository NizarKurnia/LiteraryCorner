<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Andrea Hirata',
            'photo' => 'andrea_hirata.jpg',
            'bio' => 'Penulis asal Belitung yang terkenal dengan novel Laskar Pelangi.'
        ]);
        Author::create([
            'name' => 'Henry Manampiring',
            'photo' => 'henry_manampiring.jpg',
            'bio' => 'Penulis dan praktisi komunikasi yang memperkenalkan Stoikisme lewat Filosofi Teras.'
        ]);
        Author::create([
            'name' => 'J.K. Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'Penulis asal Inggris yang menciptakan seri fenomenal Harry Potter.'
        ]);
        Author::create([
            'name' => 'Pidi Baiq',
            'photo' => 'pidi_baiq.jpg',
            'bio' => 'Penulis, musisi, dan sutradara asal Bandung, pencipta kisah Dilan.'
        ]);
        Author::create([
            'name' => 'Robert T. Kiyosaki',
            'photo' => 'robert_kiyosaki.jpg',
            'bio' => 'Penulis dan pengusaha asal Amerika, terkenal dengan buku Rich Dad Poor Dad.'
        ]);

    }
}
