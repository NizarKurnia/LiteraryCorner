@extends('layouts.admin')

@section('title', 'Edit Book')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Edit Book</h1>
        <a href="{{ route('admin.books.index') }}" class="btn btn-outline-dark">← Back</a>
    </div>

    <div class="row justify-content-center ps-lg-5 ms-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body p-5">

                    <form action="{{ route('admin.books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title', $book->title) }}">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', $book->description) }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Price</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $book->price) }}">
                                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Stock</label>
                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"
                                    value="{{ old('stock', $book->stock) }}">
                                @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Genre</label>
                                <select name="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
                                    <option value="" disabled>Select genre</option>
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}" {{ old('genre_id', $book->genre_id) == $genre->id ? 'selected' : '' }}>
                                            {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('genre_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Author</label>
                                <select name="author_id" class="form-select @error('author_id') is-invalid @enderror">
                                    <option value="" disabled>Select author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('author_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Change Cover Photo
                                <small class="text-secondary fw-normal">(optional)</small>
                            </label>
                            <input type="file" name="cover_photo"
                                class="form-control @error('cover_photo') is-invalid @enderror"
                                accept="image/jpg,image/jpeg,image/png">
                            @error('cover_photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Update Book</button>
                            <a href="{{ route('admin.books.index') }}" class="btn btn-outline-dark w-100">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
