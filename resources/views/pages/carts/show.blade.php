@extends('layouts.app')

@section('title', 'Cart Detail')

@section('content')

    <div class="row">

        <!-- BOOK IMAGE -->
        <div class="col-md-4 mb-4">

            <div class="card shadow-sm border-0">

                <img src="{{ $cart->book->cover_photo_url ?? 'https://via.placeholder.com/300x400' }}" class="card-img-top"
                    alt="{{ $cart->book->title }}" style="height: 540px; object-fit: contain;">

            </div>

        </div>

        <!-- DETAIL -->
        <div class="col-md-8">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">

                    <!-- TITLE -->
                    <h1 class="fw-bold mb-3">
                        {{ $cart->book->title }}
                    </h1>

                    <!-- AUTHOR -->
                    <p class="text-secondary fs-5 mb-2">
                        Author: {{ $cart->book->author->name }}
                    </p>

                    <!-- GENRE -->
                    <p class="mb-3">

                        <span class="badge bg-primary">
                            {{ $cart->book->genre->name }}
                        </span>

                    </p>

                    <!-- PRICE -->
                    <h3 class="text-success fw-bold mb-4">
                        Rp {{ number_format($cart->book->price) }}
                    </h3>

                    <!-- UPDATE CART FORM -->
                    <form action="/carts/{{ $cart->id }}" method="POST">

                        @csrf
                        @method('PUT')

                        <!-- QUANTITY -->
                        <div class="mb-4">

                            <h5 class="fw-bold mb-2">
                                Quantity
                            </h5>

                            <input type="number" name="quantity" class="form-control" min="1" max="{{ $cart->book->stock }}"
                                value="{{ $cart->quantity }}" required>

                        </div>

                        <!-- SUBTOTAL -->
                        <div class="mb-4">

                            <h5 class="fw-bold mb-2">
                                Subtotal
                            </h5>

                            <h4 class="text-primary fw-bold">
                                Rp {{ number_format($cart->book->price * $cart->quantity) }}
                            </h4>

                        </div>

                        <!-- DESCRIPTION -->
                        <div class="mb-4">

                            <h5 class="fw-bold mb-3">
                                Description
                            </h5>

                            <p class="text-secondary">
                                {{ $cart->book->description }}
                            </p>

                        </div>

                        <!-- ACTION -->
                        <div class="d-flex gap-2">

                            <button class="btn btn-primary">
                                Update Cart
                            </button>

                            <a href="/carts" class="btn btn-outline-dark">
                                Back to Cart
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
