<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::latest()->get();
        return view('pages.admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('pages.admin.genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        Genre::create($request->only('name', 'description'));

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('pages.admin.genres.show', compact('genre'));
    }

    public function edit(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('pages.admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, string $id)
    {
        $genre = Genre::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        $genre->update($request->only('name', 'description'));

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('admin.genres.index')
            ->with('success', 'Genre berhasil dihapus!');
    }
}
