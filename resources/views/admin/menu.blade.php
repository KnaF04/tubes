@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="d-flex mt-2" >Hi Admin 1001 Welcome !!</h1>
    <h3 class="mt-5">Ringkasan Dashboard</h3>
    <div class="row">
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Buku</h5>
                    <p class="card-text">{{ $totalBooks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pelanggan Terdaftar</h5>
                    <p class="card-text">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
