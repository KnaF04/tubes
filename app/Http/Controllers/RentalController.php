<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function showConfirmation($id)
    {
        // Retrieve the book details by ID
        $buku = Buku::findOrFail($id);

        // Return the view with the book data
        return view('confirm-rental', compact('buku'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'judul_buku' => 'required|string|max:255',
            'gambar_buku' => 'required|string|max:255',
            'name_user' => 'required|string|max:255',
        ]);

        // Create a new Transaksi record
        $transaksi = new Transaksi;
        $transaksi->id_transaksi = uniqid(); // Generate a unique transaction ID
        $transaksi->buku_id = $request->input('book_id'); // Include the buku_id
        $transaksi->name = $request->input('name_user');
        $transaksi->judul_buku = $request->input('judul_buku');
        $transaksi->gambar_buku = $request->input('gambar_buku');
        $transaksi->save();

        // Redirect back to the catalog with a success message
        return redirect()->route('catalog.index')->with('success', 'Book rental confirmed!');
    }
}
