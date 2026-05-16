@extends('layouts.admin')

@section('title', 'Manage Genres')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Genres</h1>
            <p class="text-secondary">Manage all genres in the store.</p>
        </div>
        <a href="{{ route('admin.genres.create') }}" class="btn btn-primary">+ Add Genre</a>
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($genres as $index => $genre)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-bold">{{ $genre->name }}</td>
                                <td>{{ $genre->description }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.genres.edit', $genre->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this genre?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-secondary">No genres found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
