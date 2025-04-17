

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            {{-- <img src="{{ asset('Bootslander/assets/img/logo.png')}}" alt=""> --}}
            <h1 class="sitename">SiDesa</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#about">Profil Desa</a></li>
                <li><a href="#features">Infografis</a></li>
                <li><a href="#gallery">Listing</a></li>
                {{-- <li><a href="#team">Team</a></li> --}}
                <li class="dropdown"><a href="#"><span>Informasi</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Pengaduan</a></li>
                        <li><a href="#">PPID</a></li>
                        <li><a href="#">Dropdown 4</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="#">Deep Dropdown 1</a></li>
                                <li><a href="#">Deep Dropdown 2</a></li>
                                <li><a href="#">Deep Dropdown 3</a></li>
                                <li><a href="#">Deep Dropdown 4</a></li>
                                <li><a href="#">Deep Dropdown 5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>