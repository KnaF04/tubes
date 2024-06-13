<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert; // Import SweetAlert facade


class AdminController extends Controller
{

    public function transaksi()
    {
        $transactions = Transaksi::all();
        return view('admin.transaksi', compact('transactions'));
    }

    public function index()
    {
        $totalBooks = Buku::count();
        $totalCustomers = User::count();

        return view('admin.menu', compact('totalBooks', 'totalCustomers'))->withSuccess('Selamat datang di dashboard admin !');
    }
    public function logout()
    {
        Auth::logout(); // Logout the user
        return redirect()->route('dashboard')->withSuccess('Logout successful.');
    }


    public function book()
    {
        $bukus = Buku::all(); // Fetch all books from the Buku table
        return view('admin.book', compact('bukus'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'author_buku' => 'required',
            'desc_buku' => 'required',
            'gambar_buku'=> 'required',
        ]);

        Buku::create($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Buku $buku)
    {
        return view('admin.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul_buku' => 'required',
            'author_buku' => 'required',
            'desc_buku' => 'required',
        ]);

        $buku->update($request->all());
        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }

public function showCustomers()
{
    $customers = User::where('role', 0)->get(); // Ambil semua user dengan role 0 (pelanggan)
    return view('admin.pelanggan', compact('customers'));
}

public function indexPelanggan()
{
    $customers = User::where('role', 0)->get(); // Mengambil semua pelanggan dengan role 0
    return view('admin.pelanggan', compact('customers'));
}

    public function createPelanggan()
    {
        return view('admin.pelanggan.create');
    }

    public function storePelanggan(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $request->merge(['password' => bcrypt($request->password)]);

        User::create($request->all());
        Alert::success('Success', 'Pelanggan berhasil ditambahkan!');
        return redirect()->route('pelanggan.index');
    }

    public function editPelanggan($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.pelanggan.edit', compact('customer'));
    }

    public function updatePelanggan(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$customer->id,
            'password' => 'nullable|min:6',
        ]);

        $customer->update($request->all());
        Alert::success('Success', 'Pelanggan berhasil diperbarui!');
        return redirect()->route('pelanggan.index');
    }

    public function deletePelanggan($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();
        Alert::success('Success', 'Pelanggan berhasil dihapus!');
        return redirect()->route('pelanggan.index');
    }
}
