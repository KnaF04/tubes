@extends('admin.layout')

@section('title', 'Transaksi')

@section('content')
<div class="container mt-5">
    <h2>Data Transaksi</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $transaction->name }}</td>
                <td>{{ $transaction->judul_buku }}</td>
                <td>{{ $transaction->created_at }}</td>
                <td>
                    <!-- Add actions here if needed -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
