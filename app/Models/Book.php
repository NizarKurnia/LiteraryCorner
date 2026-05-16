<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'cover_photo',
        'genre_id',
        'author_id'
    ];

    public function getCoverPhotoUrlAttribute()
    {
        return $this->cover_photo ? asset('storage/books/' . $this->cover_photo) : 'https://picsum.photos/250';
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }


}
