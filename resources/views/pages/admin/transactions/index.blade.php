@extends('layouts.admin')

@section('title', 'Manage Transactions')

@section('content')

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Transactions</h1>
            <p class="text-secondary">Manage all transactions in the store.</p>
        </div>
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
                        <tr">
                            <th>No</th>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Book</th>
                            <th>quantity</th>
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $index => $transaction)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transaction->order_number }}</td>
                                <td class="fw-bold">{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->book->title }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>Rp {{ number_format($transaction->total_amount) }}</td>
                                <td>{{ $transaction->payment_method }}</td>
                                <td>
                                    @if ($transaction->payment_status === 'Paid')
                                        <span class="badge bg-success fs-6">Paid</span>
                                    @elseif ($transaction->payment_status === 'Pending')
                                        <span class="badge bg-warning text-dark fs-6">Pending</span>
                                    @else
                                        <span class="badge bg-danger fs-6">Cancelled</span>
                                    @endif
                                    <!-- <span class="badge {{ $transaction->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                        {{ $transaction->stock }}
                                    </span> -->
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.transactions.edit', $transaction->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('admin.transactions.destroy', $transaction->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this transaction?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-secondary">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
