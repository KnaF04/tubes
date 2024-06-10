<!DOCTYPE html>
<html lang="en">
<head>
  <x-app-layout>
    <title>Confirm Rental</title>
    <style>
      .confirmation-banner {
        background-color: #f3e9d2; /* Light yellow background */
        border-radius: 10px;
        padding: 40px;
        margin: 0 auto;
        max-width: 800px;
        display: flex; /* Enable flexbox layout */
        justify-content: center; /* Center content horizontally */
        align-items: center; /* Center content vertically */
        flex-wrap: wrap; /* Allow content to wrap if needed */
      }

      .confirmation-banner .book-image {
        width: 150px; /* Set fixed width for image */
        height: 200px; /* Set fixed height for image (adjust as needed) */
        margin-right: 20px; /* Add margin for spacing */
      }

      .confirmation-banner .confirmation-details {
        flex: 1; /* Allow details to fill remaining space */
      }

      .confirmation-banner h1 {
        text-align: center;
        margin-bottom: 20px;
      }

      .confirmation-banner .card {
        border: none;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      }

      .confirmation-banner .card-body {
        padding: 20px;
      }

      .confirmation-banner .btn-primary {
        background-color: #c79a3b; /* Orange button color */
        border-color: #c79a3b;
        margin-right: 10px;
      }

      .confirmation-banner .btn-primary:hover {
        background-color: #ae832f; /* Darker orange on hover */
        border-color: #ae832f;
      }
    </style>

</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="confirmation-banner">
          <img src="{{ Vite::asset('resources/images/' . $buku->gambar_buku) }}" class="card-img-top" alt="{{ $buku->judul_buku }}">  <div class="confirmation-details">
            <h1>Confirm Rental</h1>
            <p>Are you sure you want to rent the following book?</p>
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Judul :{{ $buku->judul_buku }}</h5>
                <p class="card-text">Nama Author :{{ $buku->author_buku }}</p>
              </div>
            </div>
            <form action="{{ route('rentals.store') }}" method="POST">
              @csrf
              <input type="hidden" name="book_id" value="{{ $buku->id }}">
              <button type="submit" class="btn btn-primary">Confirm Rental</button>
              <a href="{{ route('catalog.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
</x-app-layout>
