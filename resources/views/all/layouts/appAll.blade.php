<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SiDesa🏡</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('Bootslander/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('Bootslander/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('Bootslander/assets/css/all.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('Bootslander/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Bootslander/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Bootslander/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Bootslander/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Bootslander/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('Bootslander/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page">
    <!-- ======= Header ======= -->
    @include('all.layouts.navbarall')
    <!-- End Header -->

    {{-- diisi content --}}
    <main>
        @yield('content')
    </main>
    {{-- diisi content --}}

    <!-- Footer -->
    @include('all.layouts.footerAll')
    <!-- End Footer -->

    <!-- Container Tombol -->
    <div class="floating-buttons">
        <a href="#" id="aduan-button" class="aduan-button" data-bs-toggle="modal" data-bs-target="#aduanModal">
            <i class="bi bi-headset me-2"></i> Pengaduan
        </a>

        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
            <i class="bi bi-arrow-up-short"></i>
        </a>
    </div>
    <!-- End Container Tombol -->

    <!-- Modal Form Pengaduan -->
    @include('all.pages.modalPengaduan')
    <!-- End Modal Form Pengaduan -->

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('Bootslander/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Bootslander/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('Bootslander/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('Bootslander/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('Bootslander/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('Bootslander/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('Bootslander/assets/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Typed JS -->
    <script src="https://unpkg.com/typed.js@2.1.0"></script>
    <script>
        var options = {
            strings: ["Transparan", "Modern", "Maju", 'Berdaya', 'Mandiri'],
            typeSpeed: 50,
            backSpeed: 50,
            loop: true,
            showCursor: true,
            cursorChar: '|',
        };
    
        var typed = new Typed("#typed", options);
    </script>
</body>

</html>