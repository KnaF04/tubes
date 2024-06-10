<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1001 Library</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @vite('resources/sass/app.scss')
</head>

<body>
<main class="flex-shrink-0">
    <nav class="navbar navbar-expand-lg py-3" style="background-color: #FFC26F ">
        <div class="container px-5" >
            <a class="navbar-brand" href="/"><span class="fw-bolder">1001 LIBRARY</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder" style="color:#884A39">
                    <li class="nav-item"><a class="nav-link" href="/"></a></li>
                    <li class="nav-item"><a class="nav-link" href="about"></a></li>
                    <li class="nav-item"><a class="nav-link" href="catalogbook"></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="py-5">
        <div class="container px-5 pb-5">
            <div class="row gx-5 align-items-center">
                <div class="col-xxl-5">
                    <!-- Header text content-->
                    <div class="text-center text-xxl-start">
                        <div class="badge bg-gradient-primary-to-secondary text-white mb-4"><div class="text-uppercase">Design &middot; Development &middot; Marketing</div></div>
                        <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline" style="color: #884A39">1001 &nbsp &nbsp LIBRARY </span></h1>
                        <div class="fs-3 fw-light text-muted" style="color: #884A39">“Tanpa pengetahuan, tindakan tidak berguna dan pengetahuan tanpa tindakan adalah sia-sia."
                            - Abu Bakar</div>
                            <span>&nbsp &nbsp</span>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" style="background-color: #FFC26F"  href="{{ route('login')}}">Login</a>
                            @if (Route::has('register'))
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="register">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7">
                    <!-- Header profile picture-->
                    <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                        <div class="profile bg-gradient-primary-to-secondarygi">
                            <img class="profile-img" style="margin-left: 340px" src="{{ Vite::asset('resources/images/logorb2.png') }}" alt="..." />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="bg-gray py-5">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xxl-8">
                    <div class="text-center my-5">
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">Visi</span></h2>
                        <h4>"Menjadi tempat penyewaan buku terkemuka yang menginspirasi dan membawa kebahagiaan kepada para pembaca dari berbagai lapisan masyarakat."</h4>
                        <h2 class="display-5 fw-bolder mb-4">Misi</h2>
                        <h4 class="">Memberikan akses mudah dan luas kepada ribuan buku berkualitas untuk semua kalangan, dari berbagai genre dan bidang pengetahuan.
                            Menyediakan layanan penyewaan yang ramah pengguna dan efisien dengan pilihan penyewaan jangka pendek maupun jangka panjang.
                            Menghadirkan pengalaman yang menyenangkan dan interaktif bagi pengguna melalui platform daring dan fisik, dengan perpustakaan yang nyaman dan menarik secara visual.
                            Mendukung budaya literasi dan membantu meningkatkan minat baca masyarakat melalui inisiatif sosial dan edukatif.
                            Berkomitmen untuk keberlanjutan dan berkontribusi pada lingkungan melalui prinsip tanggung jawab sosial.</h4>
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
