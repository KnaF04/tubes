<!DOCTYPE html>
<html lang="en">
<head>
    <x-app-layout>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f3e9d2; /* Yellowish-brown background color */
            font-family: Arial, sans-serif;
        }
        .catalog-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            max-width: 100%;
            max-height: 200px; /* Fixed height for images */
            object-fit: contain; /* Ensures the image fits within the area without being cropped */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .btn-primary {
            background-color: #c79a3b; /* Yellowish-brown button color */
            border-color: #c79a3b;
        }
        .btn-primary:hover {
            background-color: #ae832f; /* Darker yellowish-brown for hover */
            border-color: #ae832f;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="catalog-container">
                    <h2 class="text-center mb-4">Catalog Book</h2>
                    <div class="row">
                        @foreach ($bukus as $buku)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <!-- Dynamically load the image using the name from the database -->
                                <img src="{{ Vite::asset('resources/images/' . $buku->gambar_buku) }}" class="card-img-top" alt="{{ $buku->judul_buku }}">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $buku->judul_buku }}</h3>
                                    <h5 class="card-tittle">{{ $buku->desc_buku }}</h5>
                                    <p class="card-text">{{ $buku->author_buku }}</p>
                                    <a href="{{ route('rentals.showConfirmation', $buku->id) }}" class="btn btn-primary">Rent Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

    <script>
        // Wait for the DOM to fully load
        document.addEventListener('DOMContentLoaded', function () {
            // Select all "Rent Now" buttons
            const rentButtons = document.querySelectorAll('.btn-primary');

            rentButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    // Prevent the default action (navigation)
                    event.preventDefault();

                    // Get the URL from the button's href attribute
                    const href = this.getAttribute('href');

                    // Show SweetAlert2 confirmation dialog
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you want to rent this book?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, rent it!',
                        cancelButtonText: 'No, cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If the user confirms, redirect to the rental confirmation URL
                            window.location.href = href;
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
</x-app-layout>
