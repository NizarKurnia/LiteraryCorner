<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->get();
        return view('pages.admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('pages.admin.authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'bio' => 'required|string',
        ]);

        // ✅ Ganti hashName() jadi basename(store())
        $path = $request->file('photo')->store('authors', 'public');

        Author::create([
            'name' => $request->name,
            'photo' => basename($path),
            'bio' => $request->bio,
        ]);

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $author = Author::findOrFail($id);
        return view('pages.admin.authors.show', compact('author'));
    }

    public function edit(string $id)
    {
        $author = Author::findOrFail($id);
        return view('pages.admin.authors.edit', compact('author'));
    }

    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bio' => 'required|string',
        ]);

        $data = $request->only('name', 'bio');

        if ($request->hasFile('photo')) {
            // Hapus foto lama dulu
            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }

            // ✅ Ganti hashName() jadi basename(store())
            $path = $request->file('photo')->store('authors', 'public');
            $data['photo'] = basename($path);
        }

        $author->update($data);

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author berhasil diupdate!');
    }

    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);

        if ($author->photo) {
            Storage::disk('public')->delete('authors/' . $author->photo);
        }

        $author->delete();

        return redirect()->route('admin.authors.index')
            ->with('success', 'Author berhasil dihapus!');
    }
}
