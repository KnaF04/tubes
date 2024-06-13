<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Buku</h2>
    <form action="{{ route('books.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul_buku">Nama Buku:</label>
            <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="{{ $buku->judul_buku }}" required>
        </div>
        <div class="form-group">
            <label for="author_buku">Pengarang:</label>
            <input type="text" class="form-control" id="author_buku" name="author_buku" value="{{ $buku->author_buku }}" required>
        </div>
        <div class="form-group">
            <label for="desc_buku">Deskripsi:</label>
            <textarea class="form-control" id="desc_buku" name="desc_buku" required>{{ $buku->desc_buku }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@include('sweetalert::alert')
</body>
</html>
