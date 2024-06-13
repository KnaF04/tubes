<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Buku Baru</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul_buku">Nama Buku:</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
        </div>
        <div class="form-group">
            <label for="author_buku">Pengarang:</label>
            <input type="text" class="form-control" id="author_buku" name="author_buku" required>
        </div>
        <div class="form-group">
            <label for="desc_buku">Deskripsi:</label>
            <textarea class="form-control" id="desc_buku" name="desc_buku" required></textarea>
        </div>
        <div class="form-group">
            <label for="gambar_buku">Gambar:</label>
            <input type="file" class="form-control" id="gambar_buku" name="gambar_buku" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.com/bootstrap/4.5.2
@include('sweetalert::alert')
