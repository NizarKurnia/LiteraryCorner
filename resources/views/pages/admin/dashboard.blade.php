@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <!-- HEADER -->
    <div class="mb-4">
        <h1 class="fw-bold mb-1">Dashboard</h1>
        <p class="text-secondary">Welcome back, {{ Auth::user()->name }}! Here's what's happening.</p>
    </div>

    <!-- STATS CARDS -->
    <div class="row g-4 mb-5">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-secondary mb-1">Total Users</p>
                            <h2 class="fw-bold mb-0">{{ $totalUsers }}</h2>
                        </div>
                        <span class="fs-1">👤</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-secondary mb-1">Total Books</p>
                            <h2 class="fw-bold mb-0">{{ $totalBooks }}</h2>
                        </div>
                        <span class="fs-1">📚</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-secondary mb-1">Total Authors</p>
                            <h2 class="fw-bold mb-0">{{ $totalAuthors }}</h2>
                        </div>
                        <span class="fs-1">✍️</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-secondary mb-1">Total Genres</p>
                            <h2 class="fw-bold mb-0">{{ $totalGenres }}</h2>
                        </div>
                        <span class="fs-1">🏷️</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-secondary mb-1">Total Transactions</p>
                            <h2 class="fw-bold mb-0">{{ $totalTransactions }}</h2>
                        </div>
                        <span class="fs-1">💳</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-secondary mb-1">Total Contacts</p>
                            <h2 class="fw-bold mb-0">{{ $totalContacts }}</h2>
                        </div>
                        <span class="fs-1">💬</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- REVENUE & TRANSACTION STATUS -->
    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <p class="text-secondary mb-1">Total Revenue</p>
                    <h3 class="fw-bold text-success">Rp {{ number_format($totalRevenue) }}</h3>
                    <small class="text-secondary">From all paid transactions</small>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">Transaction Status</h6>
                    <div class="row text-center">
                        <div class="col-4">
                            <h4 class="fw-bold text-warning mb-0">{{ $pendingTransactions }}</h4>
                            <small class="text-secondary">Pending</small>
                        </div>
                        <div class="col-4">
                            <h4 class="fw-bold text-success mb-0">{{ $paidTransactions }}</h4>
                            <small class="text-secondary">Paid</small>
                        </div>
                        <div class="col-4">
                            <h4 class="fw-bold text-danger mb-0">{{ $cancelledTransactions }}</h4>
                            <small class="text-secondary">Cancelled</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- RECENT TRANSACTIONS -->
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Recent Transactions</h5>
                <a href="{{ url('/admin/transactions') }}" class="btn btn-outline-dark btn-sm">View All</a>
            </div>

            @if ($recentTransactions->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Order</th>
                                <th>Customer</th>
                                <th>Book</th>
                                <th>Total</th>
                                <th>Method</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentTransactions as $transaction)
                                <tr>
                                    <td><small class="text-secondary">{{ $transaction->order_number }}</small></td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->book->title }}</td>
                                    <td class="fw-bold">Rp {{ number_format($transaction->total_amount) }}</td>
                                    <td>{{ $transaction->payment_method }}</td>
                                    <td>
                                        @if ($transaction->payment_status === 'Paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif ($transaction->payment_status === 'Pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td><small>{{ $transaction->created_at->format('d M Y') }}</small></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-secondary text-center py-3">No transactions yet.</p>
            @endif

        </div>
    </div>

@endsection
