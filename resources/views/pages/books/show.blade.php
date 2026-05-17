@extends('layouts.app')

@section('title', $book->title)

@section('content')

    <div class="row">

        <!-- BOOK IMAGE -->
        <div class="col-md-4 mb-4">

            <div class="card shadow-sm">

                <img src="{{ $book->cover_photo_url ?? 'https://via.placeholder.com/500x700' }}" class="card-img-top"
                    alt="{{ $book->title }}" style="height: 600px; object-fit: contain;">

            </div>

        </div>

        <!-- BOOK DETAIL -->
        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <!-- TITLE -->
                    <h1 class="fw-bold mb-3">
                        {{ $book->title }}
                    </h1>

                    <!-- AUTHOR -->
                    <p class="text-secondary fs-5 mb-2">
                        Author: {{ $book->author->name }}
                    </p>

                    <p class="text-secondary fs-5 mb-2">
                        Genre: {{ $book->genre->name }}
                    </p>

                    <!-- GENRE -->
                    <p class="mb-3">

                        <span class="badge bg-primary">
                            {{ $book->genre->name ?? 'Unknown Genre' }}
                        </span>

                    </p>

                    <!-- PRICE -->
                    <h3 class="text-success fw-bold mb-4">
                        Rp {{ number_format($book->price) }}
                    </h3>

                    <!-- STOCK -->
                    <p class="mb-4">

                        <strong>Stock:</strong>

                        @if ($book->stock > 0)

                            <span class="badge bg-success">
                                Available ({{ $book->stock }})
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Out of Stock
                            </span>

                        @endif

                    </p>

                    <!-- DESCRIPTION -->
                    <div class="mb-4">

                        <h4 class="fw-bold mb-3">
                            Description
                        </h4>

                        <p class="text-secondary">
                            {{ $book->description }}
                        </p>

                    </div>

                    <form action="/carts" method="POST">

                        @csrf

                        <!-- BOOK ID -->
                        <input type="hidden" name="book_id" value="{{ $book->id }}">

                        <!-- QUANTITY -->
                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Quantity
                            </label>

                            <input type="number" name="quantity" class="form-control" min="1" max="{{ $book->stock }}"
                                value="1" required>

                        </div>

                        <div class="d-flex gap-2">

                            <button class="btn btn-primary btn-lg">
                                Add to Cart
                            </button>

                            <a href="/books" class="btn btn-outline-dark btn-lg">
                                Back
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
