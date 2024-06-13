@extends('admin.layout')

@section('title', 'Data Buku')

@section('content')
    <h2 class="mt-5">Panel Pengelolaan Produk</h2>
    <!-- Your book management content goes here -->
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Tambah Buku</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Buku</th>
                <th>Pengarang</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bukus as $buku)
            <tr>
                <td>{{ $buku->judul_buku }}</td>
                <td>{{ $buku->author_buku }}</td>
                <td>{{ $buku->desc_buku }}</td>
                <td>
                    <a href="{{ route('books.edit', $buku->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $buku->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
