@extends('layouts.admin')

@section('title', 'Manage Authors')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Authors</h1>
            <p class="text-secondary">Manage all authors in the store.</p>
        </div>
        <a href="{{ route('admin.authors.create') }}" class="btn btn-primary">+ Add author</a>
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
                            <th>Name</th>
                            <th>Bio</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($authors as $index => $author)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ $author->photo_url }}" alt="{{ $author->name }}"
                                        style="height: 60px; width: 45px; object-fit: contain;" class="rounded">
                                </td>
                                <td class="fw-bold">{{ $author->name }}</td>
                                <td>{{ $author->bio }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.authors.edit', $author->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('admin.authors.destroy', $author->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this author?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-secondary">No authors found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
