@extends('all.layouts.appAll')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('Bootslander/assets/img/hero-bg-2.jpg') }}" alt="" class="hero-bg">

        <div class="container">
            <div class="row gy-4 justify-content-between">
                <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('Bootslander/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                </div>

                <div class="col-lg-6  d-flex flex-column justify-content-center" data-aos="fade-in">
                    <h1>Membangun Desa yang
                        <div>
                            <span id="typed"></span>
                        </div>
                        dan Sejahtera dengan <span>SiDesa</span>
                    </h1>
                    <p>SiDesa – Kemudahan Akses Informasi dan Layanan Publik dalam Genggaman!</p>
                    {{-- <div class="d-flex">
                            <a href="#ProfilDesa" class="btn-get-started">Get Started</a>
                            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div> --}}
                </div>

            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
                </path>
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3"></use>
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0"></use>
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9"></use>
            </g>
        </svg>

    </section><!-- /Hero Section -->

    <!-- about Section -->
    <section id="about" class="profilDesa about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-xl-center gy-5">
                <div class="col-xl-5 content">
                    {{-- <img src="{{ url('public.images.Roket.jpg') }}" alt=""> --}}
                    <h2>sidesaku</h2>
                    <h2>Jelajahi SiDesaKu</h2>
                    <p class="fw-bold">Melalui website ini Anda dapat menjelajahi segala hal yang
                        terkait dengan Desa. Aspek pemerintahan, penduduk, demografi, potensi Desa,
                        dan juga berita tentang Desa.</p>
                    <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="col-xl-7">
                    <div class="row gy-4 icon-boxes">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box">
                                <i class="bi bi-buildings"></i>
                                <h3>Profil Desa</h3>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-clipboard-pulse"></i>
                                <h3>Infografis</h3>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-command"></i>
                                <h3>Informasi</h3>
                            </div>
                        </div> <!-- End Icon Box -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-graph-up-arrow"></i>
                                <h3>PPID</h3>
                            </div>
                        </div> <!-- End Icon Box -->

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /about Section -->

    <!-- ProfilDesa Section -->
    <section id="profilDesa" class="VisiMisi section dark-background pt-0">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="container p-5">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <!-- Visi -->
                        <div class="profil-box text-center text-black">
                            <h2 class="profil-title ">Visi</h2>
                            <p>“Desa Kersik sebagai Desa Wisata yang mampu mengelolah potensi Desa dan pembangunan
                                berkelanjutan untuk mewujudkan masyarakat yang sejahtera”</p>
                        </div>

                        <!-- Misi -->
                        <div class="profil-box mt-4 text-black">
                            <h2 class="profil-title text-center">Misi</h2>
                            <ol>
                                <li>Mewujudkan tata kelola pemerintahan yang baik</li>
                                <li>Mengembangkan kegiatan keagamaan</li>
                                <li>Meningkatkan kualitas pendidikan dan sumber daya manusia</li>
                                <li>Mengembangkan teknologi informasi</li>
                                <li>Pembangunan infrastruktur, sarana dan prasarana</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- penjelasan profildesa -->
        <section id="ProfilDesa" class="ProfilDesa section light-background">
            <div class="container ">
                <h2 class="fw-bold">Bagan Desa</h2>
                <div class="row">
                    <!-- Struktur Organisasi Pemerintahan Desa -->
                    <div class="col-md-6 mb-4">
                        <h5 class="profil-title text-center fw-bold">Struktur Organisasi Pemerintahan Desa</h5>
                        <div class="bg-white p-3 rounded shadow">
                            <img src="{{ asset('Bootslander/assets/img/StrukturOrganisasiDesa.png') }}"
                                class="img-fluid w-100" alt="Struktur Pemerintahan Desa">
                        </div>
                    </div>

                    <!-- Struktur Organisasi BPD -->
                    <div class="col-md-6 mb-4">
                        <h5 class="profil-title text-center fw-bold">Struktur Organisasi Badan Permusyawaratan Desa</h5>
                        <div class="bg-white p-3 rounded shadow">
                            <img src="{{ asset('Bootslander/assets/img/bpd.png') }}" class="img-fluid w-100"
                                alt="Struktur BPD">
                        </div>
                    </div>
                </div>
            </div>

            <!-- peta lokasi pada profil desa -->
        </section>

        <!-- peta lokasi -->
        <section id="listing" class="listing section p-0">
            <div class="container my-5">
                <h1 class="fw-bold">Peta Lokasi Desa</h1>
                <p>Menampilkan Peta Desa Dengan Interest Point Desa</p>
                <div class="row g-4">
                    <!-- Informasi Desa -->
                    <div class="col-md-6">
                        <div class="bg-white p-4 rounded shadow-sm text-dark">
                            <h5 class="profil-title fw-bold mb-3">Batas Desa:</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p><strong>Utara</strong><br>Desa Santan Ulu dan Desa Santan Ilir</p>
                                    <p><strong>Selatan</strong><br>Selat Makassar dan Desa Semangko</p>
                                </div>
                                <div class="col-6">
                                    <p><strong>Timur</strong><br>Selat Makassar</p>
                                    <p><strong>Barat</strong><br>Desa Santan Ulu</p>
                                </div>
                            </div>
                            <hr>
                            <p><strong>Luas Desa:</strong> 421.000 m<sup>2</sup></p>
                            <hr>
                            <p><strong>Jumlah Penduduk:</strong> 1.153 Jiwa</p>
                        </div>
                    </div>

                    <!-- Google Maps -->
                    <div class="col-md-6">
                        <div class="rounded shadow-sm overflow-hidden" style="min-height: 300px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31672.333243976573!2d112.70721572396627!3d-7.121171009418171!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd803ef5abbb1f5%3A0x2064393fc9111d5c!2sTelang%2C%20Kec.%20Kamal%2C%20Kabupaten%20Bangkalan%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1744990801558!5m2!1sid!2sid"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- wave -->
        <svg class="ProfilDesa-waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 24 150 28"
            preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" />
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" />
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" />
            </g>
        </svg>
    </section><!-- /ProfilDesa Section -->

    <!-- Features Section -->
    <section id="infografis" class="features section">

        <div class="container">
            <div>
                <h1 class="fw-bold">Infografis
                    siDesa</h1>
            </div>
            <div class="row gy-4  align-items-center">
                <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('images/demograf_penduduk.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="fw-bold">DEMOGRAFI PENDUDUK.</h2>
                    <p class="fw-bold">
                        Memberikan informasi lengkap mengenai karakteristik demografi penduduk suatu
                        wilayah. Mulai dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan,
                        pekerjaan, agama, dan aspek penting lainnya yang menggambarkan komposisi
                        populasi secara rinci.
                    </p>
                </div>
            </div>

        </div>

        </div>

    </section><!-- /Features Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background py-5">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="fw-bold">Jumlah Penduduk dan Kepala Keluarga</h2>
                </div>
            </div>
            <div class="row g-4">
                <!-- Total Penduduk -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 text-center p-3 shadow-sm border-0 rounded">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-total-penduduk-Du2cCbAO.svg"
                            class="mx-auto" alt="Total Penduduk" width="80">
                        <div class="card-body">
                            <h6 class="text-secondary fw-bold">TOTAL PENDUDUK</h6>
                            <h4 class="text-danger fw-bold"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $residents }}" data-purecounter-duration="1"
                                    class="purecounter"></span> <span class="text-muted">Jiwa</span></h4>
                        </div>
                    </div>
                </div>
                <!-- Kepala Keluarga -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 text-center p-3 shadow-sm border-0 rounded">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-kepala-keluarga-D4UfE36x.svg"
                            class="mx-auto" alt="Kepala Keluarga" width="80">
                        <div class="card-body">
                            <h6 class="text-secondary fw-bold">KEPALA KELUARGA</h6>
                            <h4 class="text-danger fw-bold"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $headFamilies }}" data-purecounter-duration="1"
                                    class="purecounter"></span> <span class="text-muted">Jiwa</span></h4>
                        </div>
                    </div>
                </div>
                <!-- Perempuan -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 text-center p-3 shadow-sm border-0 rounded">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-perempuan-BCmUG8mA.svg"
                            class="mx-auto" alt="Perempuan" width="80">
                        <div class="card-body">
                            <h6 class="text-secondary fw-bold">PEREMPUAN</h6>
                            <h4 class="text-danger fw-bold"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $female }}" data-purecounter-duration="1"
                                    class="purecounter"></span> <span class="text-muted">Jiwa</span></h4>
                        </div>
                    </div>
                </div>
                <!-- Laki-Laki -->
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 text-center p-3 shadow-sm border-0 rounded">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-laki-CmERQRaD.svg"
                            class="mx-auto" alt="Laki-Laki" width="80">
                        <div class="card-body">
                            <h6 class="text-secondary fw-bold">LAKI-LAKI</h6>
                            <h4 class="text-danger fw-bold"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $male }}" data-purecounter-duration="1"
                                    class="purecounter"></span> <span class="text-muted">Jiwa</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- stts kawin  -->
    <section class="stats section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h2 class="fw-bold mb-4">Berdasarkan Perkawinan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center p-3">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-belum-kawin-B6LGf_QT.svg"
                            class="mx-auto" width="80">
                        <h5 class="text-secondary fw-bold">Belum Kawin</h5>
                        <p class="text-danger fs-4 fw-bold"><span data-purecounter-start="0"
                                data-purecounter-end="{{ $belumKawin }}" data-purecounter-duration="1"
                                class="purecounter"></span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-3">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-kawin-DDA193Z5.svg"
                            class="mx-auto" width="80">
                        <h5 class="text-secondary fw-bold">Kawin</h5>
                        <p class="text-danger fs-4 fw-bold"><span data-purecounter-start="0"
                                data-purecounter-end="{{ $kawin }}" data-purecounter-duration="1"
                                class="purecounter"></span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-3">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-cerai-mati-VdEzxQgX.svg"
                            class="mx-auto" width="80">
                        <h5 class="text-secondary fw-bold">Cerai Mati</h5>
                        <p class="text-danger fs-4 fw-bold"><span data-purecounter-start="0"
                                data-purecounter-end="{{ $ceraiMati }}" data-purecounter-duration="1"
                                class="purecounter"></span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-3">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-cerai-hidup-c75sVKpW.svg"
                            class="mx-auto" width="80">
                        <h5 class="text-secondary fw-bold">Cerai Hidup</h5>
                        <p class="text-danger fs-4 fw-bold"><span data-purecounter-start="0"
                                data-purecounter-end="{{ $ceraiHidup }}" data-purecounter-duration="1"
                                class="purecounter"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- agama  -->
    <section class="stats section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <h2 class="fw-bold mb-4">Berdasarkan Agama</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-3 d-flex flex-row align-items-center">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-islam-CvTs3lrK.svg"
                            width="75" height="100" style="object-fit: contain; margin-right: 15px;">
                        <div>
                            <h3 class="text-secondary fw-bold mb-0">Islam</h3>
                            <p class="text-danger fs-4 fw-bold mb-0"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $islam }}" data-purecounter-duration="1"
                                    class="purecounter"></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 d-flex flex-row align-items-center">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-kristen-DnmWrutu.svg"
                            width="75" height="100" style="object-fit: contain; margin-right: 15px;">
                        <div>
                            <h3 class="text-secondary fw-bold mb-0">Kristen</h3>
                            <p class="text-danger fs-4 fw-bold mb-0"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $kristen }}" data-purecounter-duration="1"
                                    class="purecounter"></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 d-flex flex-row align-items-center">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-katolik-Bh6D2yYr.svg"
                            width="75" height="100" style="object-fit: contain; margin-right: 15px;">
                        <div>
                            <h3 class="text-secondary fw-bold mb-0">Katolik</h3>
                            <p class="text-danger fs-4 fw-bold mb-0"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $katolik }}" data-purecounter-duration="1"
                                    class="purecounter"></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 d-flex flex-row align-items-center">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-hindu-O6CRjU7v.svg"
                            width="75" height="100" style="object-fit: contain; margin-right: 15px;">
                        <div>
                            <h3 class="text-secondary fw-bold mb-0">Hindu</h3>
                            <p class="text-danger fs-4 fw-bold mb-0"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $hindu }}" data-purecounter-duration="1"
                                    class="purecounter"></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 d-flex flex-row align-items-center">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-buddha-4LzubUEG.svg"
                            width="75" height="100" style="object-fit: contain; margin-right: 15px;">
                        <div>
                            <h3 class="text-secondary fw-bold mb-0">Buddha</h3>
                            <p class="text-danger fs-4 fw-bold mb-0"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $buddha }}" data-purecounter-duration="1"
                                    class="purecounter"></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 d-flex flex-row align-items-center">
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/icon-konghuchu-S2zKN_1w.svg"
                            width="75" height="100" style="object-fit: contain; margin-right: 15px;">
                        <div>
                            <h3 class="text-secondary fw-bold mb-0">Konghucu</h3>
                            <p class="text-danger fs-4 fw-bold mb-0"><span data-purecounter-start="0"
                                    data-purecounter-end="{{ $konghucu }}" data-purecounter-duration="1"
                                    class="purecounter"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <div><span>Check Our</span> <span class="description-title">Contact</span></div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Address</h3>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>info@example.com</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
