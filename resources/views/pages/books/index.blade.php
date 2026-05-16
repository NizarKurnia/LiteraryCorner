@extends('layouts.app')

@section('title', 'Index')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold mb-1">
                Our Book List
            </h1>

            <p class="text-secondary">
                Find Your Book Here.
            </p>
        </div>

    </div>

    <!-- SEARCH -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="{{ url('/books') }}" method="GET">

                <div class="row">

                    <div class="col-md-10 mb-2 mb-md-0">

                        <input type="text" name="search" class="form-control" placeholder="Search book..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <button class="btn btn-dark w-100">
                            Search
                        </button>

                    </div>

                </div>

            </form>

        </div>
    </div>

    <!-- BOOK LIST -->
    <div class="row">

        @forelse ($books as $book)

            <div class="col-md-4 mb-4">

                <div class="card h-100 shadow-sm">

                    <!-- IMAGE -->
                    <img src="{{ $book->cover_photo_url }}" class="card-img-top"
                        alt="{{ $book->title }}" style="height: 250px; object-fit: contain;">

                    <!-- BODY -->
                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title">
                            {{ $book->title }}
                        </h5>

                        <p class="text-secondary mb-2">
                            Author: {{ $book->author->name }}
                        </p>

                        <p class="text-secondary mb-2">
                            Genre: {{ $book->genre->name }}
                        </p>

                        <div class="mt-auto">

                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <span class="fw-bold text-primary fs-5">
                                    Rp {{ number_format($book->price) }}
                                </span>

                                <span class="badge bg-success">
                                    {{ $book->stock }} Stock
                                </span>

                            </div>

                            <div class="d-flex gap-2">

                                <a href="/books/{{ $book->id }}" class="btn btn-primary w-100 ">
                                    Detail
                                </a>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning">
                    Book not found.
                </div>

            </div>

        @endforelse

    </div>

@endsection
