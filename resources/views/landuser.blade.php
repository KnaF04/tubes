
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
@vite('resources/sass/app.scss')

<main class="flex-shrink-0">
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
                            <a class="btn btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" style="background-color: #FFC26F"  href="login">Login</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="register">Register</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7">
                    <!-- Header profile picture-->
                    <div class="d-flex justify-content-center mt-5 mt-xxl-0">
                        <div class="profile bg-gradient-primary-to-secondary">
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
                        <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">About Us</span></h2>
                        <h4>One Thousan One Library adalah sebuah website untuk memfasilitasi antara user dan pihak perpustakaan agar lebih mudah dalam melakukan proses peminjaman dan pengembalian buku.</h4>
                        <p class="lead fw-light mb-4">Our Goals</p>
                        <p class="text-muted">Website perpustakaan memungkinkan pengguna untuk melakukan peminjaman buku dan sumber daya lainnya secara online.</p>
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
