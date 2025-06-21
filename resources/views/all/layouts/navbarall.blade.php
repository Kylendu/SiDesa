<header id="header" class="header d-flex align-items-center fixed-top"
    style="{{ !Request::is('home') && !Request::is('/') ? 'background-color: #10058c;' : '' }}">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('Bootslander/assets/img/logo.png') }}" alt="" class="floating">
            <h1 class="sitename">SiDesa</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li><a href="{{ !Request::is('home') && !Request::is('/') ? route('home') : '#profilDesa' }}">Profil
                        Desa</a></li>
                <li><a href="{{ !Request::is('home') && !Request::is('/') ? route('home') : '#listing' }}">Listing</a>
                </li>
                <li><a
                        href="{{ !Request::is('home') && !Request::is('/') ? route('home') : '#infografis' }}">Infografis</a>
                </li>
                {{-- <li><a href="#team">Team</a></li> --}}
                <li class="dropdown"><a href="#"><span>Informasi</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('berita') }}">Berita</a></li>
                        <li><a href="{{ route('ppid') }}">PPID</a></li>
                        <li><a href="{{ route('dokumen') }}">Dokumen</a></li>
                        <li><a href="{{ route('pelatihan') }}">Pelatihan Desa</a></li>
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
                <li><a href="{{  route('inventory') }}">Inventaris</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
