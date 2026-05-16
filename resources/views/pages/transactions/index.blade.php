@extends('layouts.app')

@section('title', 'Transactions')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Transaction History</h1>
            <p class="text-secondary">List of your completed transactions.</p>
        </div>
        <a href="/books" class="btn btn-primary">Buy More Books</a>
    </div>

    @if ($transactions->count() > 0)

        @foreach ($transactions as $transaction)

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">

                    <!-- TOP -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="fw-bold mb-1">Order #{{ $transaction->order_number }}</h5>
                            <p class="text-secondary mb-0">{{ $transaction->created_at->format('d M Y H:i') }}</p>
                        </div>

                        {{-- Badge status sesuai payment_status --}}
                        @if ($transaction->payment_status === 'Paid')
                            <span class="badge bg-success fs-6">Paid</span>
                        @elseif ($transaction->payment_status === 'Pending')
                            <span class="badge bg-warning text-dark fs-6">Pending</span>
                        @else
                            <span class="badge bg-danger fs-6">Cancelled</span>
                        @endif
                    </div>

                    <!-- BOOK -->
                    <div class="row align-items-center mb-4">

                        <!-- IMAGE -->
                        <div class="col-md-2 mb-3 mb-md-0">
                            <img src="{{ $transaction->book->cover_photo
                        ? asset('storage/books/' . $transaction->book->cover_photo)
                        : 'https://via.placeholder.com/300x400' }}" class="img-fluid rounded"
                                alt="{{ $transaction->book->title }}" style="height: 120px; width: 100%; object-fit: contain;">
                        </div>

                        <!-- DETAIL -->
                        <div class="col-md-6">
                            <h5 class="fw-bold">{{ $transaction->book->title }}</h5>
                            <p class="text-secondary mb-1">Author: {{ $transaction->book->author->name }}</p>
                            <p class="text-secondary mb-1">Genre: {{ $transaction->book->genre->name }}</p>
                            <p class="mb-1">Qty: {{ $transaction->quantity }}</p>
                            <p class="mb-0">Payment: {{ $transaction->payment_method }}</p>
                        </div>


                        <!-- PRICE -->
                        <div class="col-md-4 text-md-end">
                            <h5 class="text-success fw-bold">Rp {{ number_format($transaction->total_amount) }}</h5>
                        </div>

                    </div>

                    <!-- TOTAL -->
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Total Payment</h5>
                        <div class="d-flex align-items-center gap-3">
                            <h4 class="fw-bold text-success mb-0">Rp {{ number_format($transaction->total_amount) }}</h4>
                            <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-outline-primary btn-sm">
                                View Detail
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        @endforeach

    @else

        <div class="card shadow-sm border-0">
            <div class="card-body text-center py-5">
                <h2 class="mb-3">📦</h2>
                <h4 class="fw-bold">No Transactions Yet</h4>
                <p class="text-secondary mb-4">Your completed transactions will appear here.</p>
                <a href="/books" class="btn btn-primary">Start Shopping</a>
            </div>
        </div>

    @endif

@endsection
