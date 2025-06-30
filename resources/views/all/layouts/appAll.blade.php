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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('Bootslander/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Bootslander/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('Bootslander/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('Bootslander/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Bootslander/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('Bootslander/assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- =======================================================
  * Template Name: Bootslander
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<body class="index-page">
    <!-- ======= Header ======= -->
    @include('all.layouts.navbarall')
    <!-- End Header -->

    {{-- diisi content --}}
    <main class="{{ !Request::is('home') && !Request::is('/') ? 'mt-5' : '' }}">
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

        // modal pengaduan

        $('#formPengaduan').submit(function(e) {
            e.preventDefault();

            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('title', $('#title').val());
            formData.append('content', $('#content').val());
            formData.append('kategori', $('#kategori').val());
            formData.append('author', $('#author').val());
            formData.append('jenis', 'pengaduan');

            if ($('#img')[0].files[0]) {
                formData.append('img', $('#img')[0].files[0]);
            }

            $.ajax({
                url: "{{ route('pengaduan.store') }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success('Pengaduan berhasil dikirim!');
                    $('#formPengaduan')[0].reset();
                    $('#aduanModal').modal('hide');
                },
                error: function(xhr) {
                    toastr.error('Gagal mengirim pengaduan!');
                }
            });
        });

        document.getElementById('img').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview-img');

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            const carouselTrack = document.querySelector('.carousel-track');
            const initialCards = Array.from(carouselTrack.children);

            // Perhitungan lebar kartu dan gap.
            // Pastikan ini sesuai dengan nilai di CSS dan Tailwind.
            // Tailwind max-w-xs adalah 20rem (320px)
            // Tailwind gap-3 adalah 0.75rem (12px)
            const cardWidth = 320; // max-w-xs = 320px
            const gapWidth = 12; // gap-3 = 12px

            // Duplikasi kartu dua kali untuk memastikan loop mulus
            initialCards.forEach(card => {
                const clone = card.cloneNode(true);
                carouselTrack.appendChild(clone);
            });
            initialCards.forEach(card => {
                const clone = card.cloneNode(true);
                carouselTrack.appendChild(clone);
            });

            const totalOriginalWidth = (cardWidth + gapWidth) * initialCards.length;

            let currentPosition = 0;
            let currentScrollSpeed;

            const normalSpeed = 1.0; // Kecepatan default
            const hoverSpeed = 0.5; // Kecepatan saat mouse hover (lebih lambat)

            currentScrollSpeed = normalSpeed;

            let animationFrameId;

            function animateScroll() {
                currentPosition -= currentScrollSpeed;

                if (Math.abs(currentPosition) >= totalOriginalWidth) {
                    currentPosition = 0; // Reset posisi ke awal
                }

                carouselTrack.style.transform = `translateX(${currentPosition}px)`;
                animationFrameId = requestAnimationFrame(animateScroll);
            }

            function startScroll() {
                if (!animationFrameId) {
                    animateScroll();
                }
            }

            function stopScroll() {
                if (animationFrameId) {
                    cancelAnimationFrame(animationFrameId);
                    animationFrameId = null;
                }
            }

            // Mulai animasi pertama kali
            startScroll();

            // Event Listener untuk mengatur kecepatan saat mouse hover pada carousel-wrapper
            document.querySelector('.carousel-wrapper').addEventListener('mouseenter', () => {
                currentScrollSpeed = hoverSpeed; // Ubah kecepatan menjadi lebih lambat
            });

            document.querySelector('.carousel-wrapper').addEventListener('mouseleave', () => {
                currentScrollSpeed = normalSpeed; // Kembalikan kecepatan ke normal
            });
        });
    </script>

</body>

</html>
