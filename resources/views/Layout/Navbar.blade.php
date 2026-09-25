<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <title>Adam Dustin Bhakti</title>
</head>
<body>
    <nav class="navbar-elegant" id="navbar-main">
        <div class="navbar-inner">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="navbar-logo" aria-label="Beranda">
                <img src="{{ asset('storage/' . $logo->profile_image) }}" alt="Adam Dustin Bhakti">
            </a>

            <!-- Desktop Links -->
            <div class="navbar-links">
                <a href="{{ route('berita') }}"
                   class="navbar-link {{ request()->is('Berita') ? 'active' : '' }}">
                    Berita
                </a>
                <a href="{{ route('profil') }}"
                   class="navbar-link {{ request()->is('Profil') ? 'active' : '' }}">
                    Profil
                </a>
                <a href="{{ route('galery') }}"
                   class="navbar-link {{ request()->is('galery') ? 'active' : '' }}">
                    Galeri
                </a>
                <a href="{{ route('home') }}"
                   class="navbar-link {{ request()->is('/') ? 'active' : '' }}">
                    Beranda
                </a>
            </div>

            <!-- Hamburger Mobile -->
            <button class="navbar-hamburger" id="hamburger-btn" aria-label="Menu" aria-expanded="false">
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="navbar-mobile-menu" id="mobile-menu">
            <a href="{{ route('berita') }}"
               class="navbar-link {{ request()->is('Berita') ? 'active' : '' }}">Berita</a>
            <a href="{{ route('profil') }}"
               class="navbar-link {{ request()->is('Profil') ? 'active' : '' }}">Profil</a>
            <a href="{{ route('galery') }}"
               class="navbar-link {{ request()->is('galery') ? 'active' : '' }}">Galeri</a>
            <a href="{{ route('home') }}"
               class="navbar-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
        </div>
    </nav>

    <script>
        const btn = document.getElementById('hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            const open = menu.classList.toggle('open');
            btn.setAttribute('aria-expanded', open);
        });
    </script>
</body>
</html>
