<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    // Menampilkan daftar transaksi
    public function transaksi()
    {
        $transactions = Transaksi::all();
        return view('admin.transaksi', compact('transactions'));
    }

    // Menampilkan dashboard admin
    public function index()
    {
        $totalBooks = Buku::count();
        $totalCustomers = User::count();
        return view('admin.menu', compact('totalBooks', 'totalCustomers'))->withSuccess('Selamat datang di dashboard admin!');
    }

    // Logout dari dashboard admin
    public function logout()
    {
        Auth::logout();
        return redirect()->route('dashboard')->withSuccess('Logout berhasil.');
    }

    // Menampilkan daftar buku
    public function book()
    {
        $bukus = Buku::all();
        return view('admin.book', compact('bukus'));
    }

    // Menampilkan form untuk menambah buku baru
    public function create()
    {
        return view('admin.create');
    }

    // Menyimpan data buku baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required',
            'author_buku' => 'required',
            'desc_buku' => 'required',
            'gambar_buku' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_buku')) {
            $file = $request->file('gambar_buku');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/buku', $fileName);
        }

        Buku::create([
            'judul_buku' => $request->input('judul_buku'),
            'author_buku' => $request->input('author_buku'),
            'desc_buku' => $request->input('desc_buku'),
            'gambar_buku' => $fileName ?? null,
        ]);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit buku
    public function edit(Buku $buku)
    {
        return view('admin.edit', compact('buku'));
    }

    // Memperbarui data buku
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul_buku' => 'required',
            'author_buku' => 'required',
            'desc_buku' => 'required',
            'gambar_buku' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_buku')) {
            $file = $request->file('gambar_buku');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/buku', $fileName);

            if ($buku->gambar_buku) {
                Storage::delete('public/buku/' . $buku->gambar_buku);
            }

            $buku->gambar_buku = $fileName;
        }

        $buku->update($request->only('judul_buku', 'author_buku', 'desc_buku', 'gambar_buku'));

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui');
    }

    // Menghapus buku dari database
    public function destroy(Buku $buku)
    {
        if ($buku->gambar_buku) {
            Storage::delete('public/buku/' . $buku->gambar_buku);
        }
        $buku->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }

    // Menampilkan daftar pelanggan
    public function showCustomers()
    {
        $customers = User::where('role', 0)->get();
        return view('admin.pelanggan', compact('customers'));
    }

    // Menampilkan daftar pelanggan
    public function indexPelanggan()
    {
        $customers = User::where('role', 0)->get();
        return view('admin.pelanggan', compact('customers'));
    }

    // Menampilkan form untuk menambah pelanggan baru
    public function createPelanggan()
    {
        return view('admin.pelanggan.create');
    }

    // Menyimpan data pelanggan baru ke database
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

    // Menampilkan form untuk mengedit pelanggan
    public function editPelanggan($id)
    {
        $customer = User::findOrFail($id);
        return view('admin.pelanggan.edit', compact('customer'));
    }

    // Memperbarui data pelanggan
    public function updatePelanggan(Request $request, $id)
    {
        $customer = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $customer->id,
            'password' => 'nullable|min:6',
        ]);

        if ($request->has('password') && $request->password) {
            $customer->password = bcrypt($request->password);
        }

        $customer->update($request->only('name', 'email'));

        Alert::success('Success', 'Pelanggan berhasil diperbarui!');
        return redirect()->route('pelanggan.index');
    }

    // Menghapus pelanggan dari database
    public function deletePelanggan($id)
    {
        $customer = User::findOrFail($id);
        $customer->delete();
        Alert::success('Success', 'Pelanggan berhasil dihapus!');
        return redirect()->route('pelanggan.index');
    }
    public function completeTransaction(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required|exists:transaksis,id_transaksi',
        ]);

        $transaction = Transaksi::where('id_transaksi', $request->id_transaksi)->first();
        if ($transaction) {
            $transaction->keterangan_transaksi = true;
            $transaction->save();

            Alert::success('Success', 'Transaksi berhasil diselesaikan!');
            return redirect()->route('pengembalian');
        } else {
            Alert::error('Error', 'ID Transaksi tidak ditemukan!');
            return redirect()->route('pengembalian');
        }
    }
}
