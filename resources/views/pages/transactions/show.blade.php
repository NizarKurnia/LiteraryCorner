@extends('layouts.app')

@section('title', 'Transaction Detail')

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- SUCCESS MESSAGE --}}
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- HEADER -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fw-bold mb-1">Transaction Detail</h1>
                    <p class="text-secondary mb-0">Order #{{ $transaction->order_number }}</p>
                </div>
                <a href="{{ route('transactions.index') }}" class="btn btn-outline-dark">
                    ← Back
                </a>
            </div>

            <!-- STATUS CARD -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">

                    <div class="row text-center">

                        <div class="col-md-4 mb-3 mb-md-0">
                            <p class="text-secondary mb-1">Order Date</p>
                            <strong>{{ $transaction->created_at->format('d M Y H:i') }}</strong>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <p class="text-secondary mb-1">Payment Method</p>
                            <strong>{{ $transaction->payment_method }}</strong>
                        </div>

                        <div class="col-md-4">
                            <p class="text-secondary mb-1">Payment Status</p>
                            @if ($transaction->payment_status === 'Paid')
                                <span class="badge bg-success fs-6">Paid</span>
                            @elseif ($transaction->payment_status === 'Pending')
                                <span class="badge bg-warning text-dark fs-6">Pending</span>
                            @else
                                <span class="badge bg-danger fs-6">Cancelled</span>
                            @endif
                        </div>

                    </div>

                </div>
            </div>

            <!-- BOOK DETAIL -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">Book Ordered</h5>

                    <div class="row align-items-center">

                        <!-- IMAGE -->
                        <div class="col-md-3 mb-3 mb-md-0">
                            <img src="{{ $transaction->book->cover_photo ? asset('storage/books/' . $transaction->book->cover_photo) : 'https://via.placeholder.com/300x400' }}"
                                class="img-fluid rounded" alt="{{ $transaction->book->title }}"
                                style="height: 150px; width: 100%; object-fit: contain;">
                        </div>

                        <!-- DETAIL -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-1">{{ $transaction->book->title }}</h5>
                            <p class="text-secondary mb-1">Author: {{ $transaction->book->author->name }}</p>
                            <p class="text-secondary mb-1">Genre: {{ $transaction->book->genre->name }}</p>
                            <p class="mb-0">Qty: <strong>{{ $transaction->quantity }}</strong></p>
                        </div>

                        <!-- PRICE -->
                        <div class="col-md-3 text-md-end">
                            <p class="text-secondary mb-1">Price/item</p>
                            <p class="fw-bold mb-1">Rp {{ number_format($transaction->book->price) }}</p>
                        </div>

                    </div>

                </div>
            </div>

            <!-- PAYMENT SUMMARY -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-4">Payment Summary</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary">Price</span>
                        <span>Rp {{ number_format($transaction->book->price) }}</span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-secondary">Quantity</span>
                        <span>{{ $transaction->quantity }}</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <h5 class="fw-bold mb-0">Total</h5>
                        <h5 class="fw-bold text-success mb-0">Rp {{ number_format($transaction->total_amount) }}</h5>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
