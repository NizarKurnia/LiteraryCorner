<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'photo', 'bio'];

    // ✅ Tambahkan accessor ini
    public function getPhotoUrlAttribute()
    {
        return $this->photo
            ? asset('storage/authors/' . $this->photo)
            : 'https://picsum.photos/150';
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
