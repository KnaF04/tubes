<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>

    </x-slot>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1001 Library</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @vite('resources/sass/app.scss')
    @livewireStyles
</head>

<body>


    <main class="flex-shrink-0">




    <section class="bg-gray py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-8">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Us</span></h2>
                        <h4>One Thousan One Library adalah sebuah website untuk memfasilitasi antara user dan pihak perpustakaan agar lebih mudah dalam melakukan proses peminjaman dan pengembalian buku.</h4>
                        <h3 class="display-5 fw-bolder mt-5"><span class="text-gradient d-inline">1001 Library</span></h3>
                        <h4>Memberikan akses mudah dan luas kepada ribuan buku berkualitas untuk semua kalangan, dari berbagai genre dan bidang pengetahuan.
                            Menyediakan layanan penyewaan yang ramah pengguna dan efisien dengan pilihan penyewaan jangka pendek maupun jangka panjang.
                            Menghadirkan pengalaman yang menyenangkan dan interaktif bagi pengguna melalui platform daring dan fisik, dengan perpustakaan yang nyaman dan menarik secara visual.
                            Mendukung budaya literasi dan membantu meningkatkan minat baca masyarakat melalui inisiatif sosial dan edukatif.
                            Berkomitmen untuk keberlanjutan dan berkontribusi pada lingkungan melalui prinsip tanggung jawab sosial..</h4>
                        <h4 class="d-flex mt-5">Tujuan</h4>
                        <h5 class="d-flex">1. Mempermudah peminjaman Pengguna</h5>
                        <h5 class="d-flex">2. Meningkatkan Kepuasan Pengguna</h5>
                        <h5 class="d-flex">3. Meminimalkan Hilangnya Buku saat meminjam/menyewa</h5>
                        <h5 class="d-flex">4. Menyediakan berbagai buku dan informasi lengkap</h5>
                        <h5 class="d-flex">5. Mempermudah Penyewaan buku online</h5>

                        <div class="d-flex justify-content-center fs-2 gap-4">
                            <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                            <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



    @vite('resources/js/app.js')
</body>

</html>
</x-app-layout>
