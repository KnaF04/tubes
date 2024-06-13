<!DOCTYPE html>
<html lang="en">
<head>
  <title>Confirm Rental</title>
  <style>
    /* General styling for the confirmation banner */
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

    /* Styling for the book image */
    .confirmation-banner .book-image {
      width: 150px; /* Fixed width for image */
      height: 200px; /* Fixed height for image */
      margin-right: 20px; /* Margin for spacing between image and details */
    }

    /* Styling for the details section */
    .confirmation-banner .confirmation-details {
      flex: 1; /* Allow details to fill remaining space */
    }

    /* Center the heading and add margin */
    .confirmation-banner h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    /* Styling for the card that contains book details */
    .confirmation-banner .card {
      border: none;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Padding inside the card */
    .confirmation-banner .card-body {
      padding: 20px;
    }

    /* Styling for the primary button (Confirm Rental) */
    .confirmation-banner .btn-primary {
      background-color: #c79a3b; /* Orange button color */
      border-color: #c79a3b;
      margin-right: 10px;
    }

    /* Hover effect for the primary button */
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
          <!-- Display the book image -->
          <img src="{{ asset('storage/images/' . $buku->gambar_buku) }}" class="book-image" alt="{{ $buku->judul_buku }}">
          <div class="confirmation-details">
            <h1>Confirm Rental</h1>
            <p>Are you sure you want to rent the following book?</p>
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Judul: {{ $buku->judul_buku }}</h5>
                <p class="card-text">Author: {{ $buku->author_buku }}</p>
              </div>
            </div>
            <!-- Form to confirm rental -->
            <form action="{{ route('rentals.store') }}" method="POST">
              @csrf
              <input type="hidden" name="buku_id" value="{{ $buku->id }}">
              <input type="hidden" name="judul_buku" value="{{ $buku->judul_buku }}">
              <input type="hidden" name="gambar_buku" value="{{ $buku->gambar_buku }}">
              <input type="hidden" name="name_user" value="{{ Auth::user()->name }}">
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
