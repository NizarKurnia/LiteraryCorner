@extends('layouts.admin')

@section('title', 'Manage Books')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Books</h1>
            <p class="text-secondary">Manage all books in the store.</p>
        </div>
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary">+ Add Book</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- TABLE -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $index => $book)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ $book->cover_photo_url }}" alt="{{ $book->title }}"
                                        style="height: 60px; width: 45px; object-fit: contain;" class="rounded">
                                </td>
                                <td class="fw-bold">{{ $book->title }}</td>
                                <td>{{ $book->author->name }}</td>
                                <td><span class="badge bg-primary">{{ $book->genre->name }}</span></td>
                                <td>Rp {{ number_format($book->price) }}</td>
                                <td>
                                    <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $book->stock }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.books.edit', $book->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus buku ini?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-secondary">No books found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
