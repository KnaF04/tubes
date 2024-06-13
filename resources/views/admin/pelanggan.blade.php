@extends('admin.layout')

@section('title', 'Pelanggan')

@section('content')
<div class="container mt-5">
    <h2>Data Pelanggan</h2>
    <a href="{{ route('pelanggan.create') }}" class="btn btn-success mb-3">Tambah Pelanggan</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $customer->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
