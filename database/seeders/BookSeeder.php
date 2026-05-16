<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Laskar Pelangi',
            'description' => 'Kisah perjuangan anak-anak Belitung dalam meraih pendidikan.',
            'price' => 85000,
            'stock' => 50,
            'cover_photo' => 'laskar_pelangi.jpg',
            'genre_id' => 1,
            'author_id' => 1,
        ]);
        Book::create([
            'title' => 'Filosofi Teras',
            'description' => 'Buku pengantar filsafat Stoikisme untuk kehidupan modern.',
            'price' => 95000,
            'stock' => 30,
            'cover_photo' => 'filosofi_teras.jpg',
            'genre_id' => 2,
            'author_id' => 2,
        ]);
        Book::create([
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'description' => 'Petualangan Harry Potter di Hogwarts School of Witchcraft and Wizardry.',
            'price' => 120000,
            'stock' => 60,
            'cover_photo' => 'harry_potter.jpg',
            'genre_id' => 3,
            'author_id' => 3,
        ]);
        Book::create([
            'title' => 'Dilan 1990',
            'description' => 'Kisah cinta remaja antara Dilan dan Milea di Bandung.',
            'price' => 75000,
            'stock' => 120,
            'cover_photo' => 'dilan_1990.jpg',
            'genre_id' => 4,
            'author_id' => 4,
        ]);
        Book::create([
            'title' => 'Rich Dad Poor Dad',
            'description' => 'Pelajaran finansial dari dua perspektif ayah kaya dan ayah miskin.',
            'price' => 100000,
            'stock' => 70,
            'cover_photo' => 'rich_dad_poor_dad.jpg',
            'genre_id' => 5,
            'author_id' => 5,
        ]);
    }
}
