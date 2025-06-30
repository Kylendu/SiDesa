<header id="header" class="header d-flex align-items-center fixed-top"
    style="{{ !Request::is('home') && !Request::is('/') ? 'background-color: #10058c;' : '' }}">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('Bootslander/assets/img/logo.png') }}" alt="" class="floating">
            <h1 class="sitename">SiDesa</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li><a href="{{ !Request::is('home') && !Request::is('/') ? route('home') : '#profilDesa' }}">Profil Desa</a></li>
                <li><a href="{{ !Request::is('home') && !Request::is('/') ? route('home') : '#listing' }}">Listing</a></li>
                <li><a href="{{ !Request::is('home') && !Request::is('/') ? route('home') : '#infografis' }}">Infografis</a></li>
                <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('berita') }}">Berita</a></li>
                        <li><a href="{{ route('ppid') }}">PPID</a></li>
                        <li><a href="{{ route('dokumen') }}">Dokumen</a></li>
                        <li><a href="{{ route('pelatihan') }}">Pelatihan Desa</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('inventory') }}">Inventaris</a></li>
                <li><a href="#contact">Contact</a></li>

                @guest
                <li>
                    <a href="{{ route('login') }}" class="btn btn-aqua" style="color: white;">Login</a>
                </li>
                @endguest

                @auth
                <li class="dropdown">
                    <a href="#">
                        <i class="bi bi-person-circle"></i>
                        <span style="margin-left: 6px;">{{ Auth::user()->name }}</span>
                        <i class="bi bi-chevron-down toggle-dropdown" style="margin-left: 4px;"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('profil') }}" style="padding:10px 20px; display:block;">Profil</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" style="background:none; border:none; padding:10px 20px; width:100%; text-align:left; color: black;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>

    <script>
        document.querySelector('.mobile-nav-toggle').addEventListener('click', function(e) {
            document.body.classList.toggle('mobile-nav-active');
        });

        document.querySelectorAll('.toggle-dropdown').forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                let parentLi = this.closest('li');
                parentLi.querySelector('ul').classList.toggle('dropdown-active');
            });
        });
    </script>
</header>