<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #111;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #f1f1f1;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h3 class="text-light pl-3">Persewaan Buku</h3>
    <nav class="nav flex-column mt-3">
        <a class="nav-link" href="{{ route('redirects') }}">Dashboard</a>
        <a class="nav-link" href="{{ route('book') }}">Input Data Buku</a>
        <a class="nav-link" href="{{ route('pelanggan.index') }}">Pelanggan</a>
        <a class="nav-link" href="{{ route('transaksi') }}">Bukti Pembayaran</a> <!-- Updated route -->
        <a class="nav-link" href="#">Notifikasi</a>
        <a class="nav-link mt-5" href="{{ route('admin.logout') }}">Logout</a>
    </nav>
</div>

<div class="content">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@include('sweetalert::alert')
</body>
</html>
