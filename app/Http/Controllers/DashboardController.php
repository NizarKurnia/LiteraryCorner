<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Contact;
use App\Models\Genre;
use App\Models\Transaction;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'totalUsers' => User::count(),
            'totalBooks' => Book::count(),
            'totalAuthors' => Author::count(),
            'totalGenres' => Genre::count(),
            'totalTransactions' => Transaction::count(),
            'totalContacts' => Contact::count(),
            'totalRevenue' => Transaction::where('payment_status', 'Paid')->sum('total_amount'),
            'pendingTransactions' => Transaction::where('payment_status', 'Pending')->count(),
            'paidTransactions' => Transaction::where('payment_status', 'Paid')->count(),
            'cancelledTransactions' => Transaction::where('payment_status', 'Cancelled')->count(),
            'recentTransactions' => Transaction::with('user', 'book')->latest()->take(5)->get(),
        ]);
    }
}
