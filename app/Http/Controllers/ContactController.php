<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // Admin — lihat semua pesan
    public function adminIndex()
    {
        $contacts = Contact::with('user')->latest()->get();
        return view('pages.admin.contacts.index', compact('contacts'));
    }

    // User — lihat pesan milik sendiri
    public function index()
    {
        $contacts = Contact::with('user')
            ->where('customer_id', Auth::id())
            ->latest()
            ->get();

        return view('pages.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('pages.contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'customer_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contacts.index')
            ->with('success', 'Pesan berhasil dikirim!');
    }

    public function show(string $id)
    {
        $contact = Contact::with('user')->findOrFail($id);

        if (Auth::user()->role !== 'admin' && $contact->customer_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('pages.contacts.show', compact('contact'));
    }

    // Admin — hapus pesan
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }
}
