<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    // Tampilkan semua buku di view
    public function index(Request $request)
    {
        $books = Book::with('genre', 'author')
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhereHas('author', function ($q) use ($request) {
                        $q->where('name', 'like', '%' . $request->search . '%');
                    })
                    ->orWhereHas('genre', function ($q) use ($request) {
                        $q->where('name', 'like', '%' . $request->search . '%');
                    });
            })
            ->get();

        return view('pages.books.index', compact('books'));
    }

    public function adminIndex()
    {
        $books = Book::with('genre', 'author')->latest()->get();
        return view('pages.admin.books.index', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        // ✅ store() return path lengkap, basename() ambil nama filenya saja
        $path = $request->file('cover_photo')->store('books', 'public');

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => basename($path), // ← hasil: namafile.jpg
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $book = Book::with('genre', 'author')->findOrFail($id);

        return view('pages.books.show', compact('book')); // ← return view
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $genres = Genre::all();
        $authors = Author::all();

        return view('pages.admin.books.edit', compact('book', 'genres', 'authors')); // ← return view form edit
    }

    public function create()
    {
        $genres = Genre::all();
        $authors = Author::all();

        return view('pages.admin.books.create', compact('genres', 'authors'));
    }


    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        $data = $request->only(['title', 'description', 'price', 'stock', 'genre_id', 'author_id']);

        if ($request->hasFile('cover_photo')) {
            // Hapus foto lama dulu
            if ($book->cover_photo) {
                Storage::disk('public')->delete('books/' . $book->cover_photo);
            }

            $path = $request->file('cover_photo')->store('books', 'public');
            $data['cover_photo'] = basename($path); // ← hasil: namafile.jpg
        }

        $book->update($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        if ($book->cover_photo) {
            Storage::disk('public')->delete('books/' . $book->cover_photo);
        }

        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Buku berhasil dihapus!'); // ← redirect
    }


}
