@extends('layouts.app')

@section('title', 'My Cart')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="fw-bold mb-1">
                My Cart
            </h1>

            <p class="text-secondary">
                List of books added to your cart.
            </p>

        </div>

        <a href="/books" class="btn btn-primary">
            + Add More Books
        </a>

    </div>

    @if ($carts->count() > 0)

        <div class="row">

            <!-- CART LIST -->
            <div class="col-lg-8">

                @foreach ($carts as $cart)

                    <div class="card shadow-sm border-0 mb-4">

                        <div class="card-body">

                            <div class="row align-items-center">

                                <!-- IMAGE -->
                                <div class="col-md-3 mb-3 mb-md-0">

                                    <img src="{{ $cart->book->cover_photo_url ?? 'https://via.placeholder.com/300x400' }}"
                                        class="img-fluid rounded" alt="{{ $cart->book->title }}"
                                        style="height: 180px; width: 100%; object-fit: contain;">

                                </div>

                                <!-- DETAIL -->
                                <div class="col-md-6">

                                    <h4 class="fw-bold">
                                        {{ $cart->book->title }}
                                    </h4>

                                    <p class="text-secondary mb-2">
                                        Author: {{ $cart->book->author->name }}
                                    </p>

                                    <p class="text-secondary mb-2">
                                        Genre: {{ $cart->book->genre->name }}
                                    </p>

                                    <p class="mb-2">

                                        <span class="badge bg-primary">
                                            {{ $cart->book->genre->name ?? 'Genre' }}
                                        </span>

                                    </p>

                                    <h5 class="text-success fw-bold">
                                        Rp {{ number_format($cart->book->price) }}
                                    </h5>

                                </div>

                                <!-- ACTION -->
                                <div class="col-md-3 text-md-end">

                                    <p class="mb-2">
                                        Qty: <strong>{{ $cart->quantity }}</strong>
                                    </p>

                                    <h5 class="fw-bold mb-3">
                                        Rp {{ number_format($cart->book->price * $cart->quantity) }}
                                    </h5>

                                    <div class="d-grid gap-2">

                                        <a href="/carts/{{ $cart->id }}" class="btn btn-outline-primary">
                                            Detail
                                        </a>

                                        <form action="/carts/{{ $cart->id }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger w-100">
                                                Remove
                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <!-- SUMMARY -->
            <div class="col-lg-4">

                <div class="card shadow-sm border-0">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">
                            Cart Summary
                        </h4>

                        <div class="d-flex justify-content-between mb-3">

                            <span>Total Items</span>

                            <strong>
                                {{ $carts->sum('quantity') }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mb-4">

                            <span>Total Price</span>

                            <strong class="text-success">
                                Rp {{ number_format($carts->sum('total_price')) }}
                            </strong>

                        </div>

                        <a href="{{ route('transactions.create') }}" class="btn btn-primary w-100">
                            Checkout
                        </a>

                    </div>

                </div>

            </div>

        </div>

    @else

        <!-- EMPTY CART -->
        <div class="card shadow-sm border-0">

            <div class="card-body text-center py-5">

                <h2 class="mb-3">
                    🛒
                </h2>

                <h4 class="fw-bold">
                    Your cart is empty
                </h4>

                <p class="text-secondary mb-4">
                    Add some books to your cart first.
                </p>

                <a href="/books" class="btn btn-primary">
                    Explore Books
                </a>

            </div>

        </div>

    @endif

@endsection
