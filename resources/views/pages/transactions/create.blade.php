@extends('layouts.app')

@section('title', 'Checkout')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-7">

            <!-- HEADER -->
            <div class="text-center mb-4">
                <h1 class="fw-bold">Checkout</h1>
                <p class="text-secondary">Review your order and select a payment method.</p>
            </div>

            <!-- ORDER SUMMARY -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">Order Summary</h5>

                    @foreach ($carts as $cart)
                        <div class="d-flex align-items-center mb-3">

                            <!-- IMAGE -->
                            <img src="{{ $cart->book->cover_photo ? asset('storage/books/' . $cart->book->cover_photo) : 'https://via.placeholder.com/300x400' }}"
                                class="rounded me-3" alt="{{ $cart->book->title }}"
                                style="height: 70px; width: 55px; object-fit: contain;">

                            <!-- DETAIL -->
                            <div class="grow">
                                <h6 class="fw-bold mb-0">{{ $cart->book->title }}</h6>
                                <small class="text-secondary">{{ $cart->book->author->name }}</small>
                                <p class="mb-0">Qty: {{ $cart->quantity }}</p>
                            </div>

                            <!-- PRICE -->
                            <div class="text-end">
                                <strong class="text-success">
                                    Rp {{ number_format($cart->book->price * $cart->quantity) }}
                                </strong>
                            </div>

                        </div>

                        @if (!$loop->last)
                            <hr class="my-2">
                        @endif
                    @endforeach

                    <hr>

                    <!-- TOTAL -->
                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold mb-0">Total</h5>
                        <h5 class="fw-bold text-success mb-0">
                            Rp {{ number_format($carts->sum('total_price')) }}
                        </h5>
                    </div>

                </div>
            </div>

            <!-- PAYMENT METHOD FORM -->
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">Payment Method</h5>

                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <select name="payment_method" class="form-select" required>
                                <option value="" disabled selected>Select payment method</option>
                                <option value="Cash on Delivery">Cash on Delivery</option>
                                <option value="Transfer">Transfer</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                            @error('payment_method')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">Confirm Order</button>
                            <a href="{{ route('carts.index') }}" class="btn btn-outline-dark w-100">Cancel</a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection
