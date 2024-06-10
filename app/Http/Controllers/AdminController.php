<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.menu')->withSuccess('Selamat datang di dashboard admin !');;
    }

    public function book()
    {
        // Logika untuk mengambil data produk (jika ada)
        return view('admin.book');
    }

    public function pelanggan()
    {
        // Logika untuk mengambil data pelanggan (jika ada)
        return view('admin.pelanggan');
    }

    public function bp()
    {
        // Logika untuk mengambil data bp (jika ada)
        return view('admin.bp');
    }

    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect()->route('dashboard')->withSuccess('Task Created Successfully!');; // Redirect ke halaman login (atau halaman lain yang sesuai)
    }

    // Tambahkan fungsi lain sesuai kebutuhan
}
