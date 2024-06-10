<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Models\Book; // Assuming your book model
use App\Models\Rental; // Assuming your rental model

class RentalController extends Controller
{
    public function showConfirmation(Buku $buku) // Adjust parameter type if needed
    {
        return view('confirm-rental', compact('buku'));
    }

    public function store(Request $request)
    {
        $rental = new Rental;
        $rental->user_id = Auth::id(); // Assuming you have user authentication
        $rental->book_id = $request->book_id;
        $rental->rental_date = now(); // Assuming you want to capture rental date
        $rental->save();

        // Handle successful rental (flash message, redirect, etc.)
        return redirect()->route('catalog.index')->with('success', 'Book rented successfully!');
    }
}
