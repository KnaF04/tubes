<?php

namespace App\Http\Controllers;
use App\Models\Buku;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('catalog', compact('bukus'));
    }
}

