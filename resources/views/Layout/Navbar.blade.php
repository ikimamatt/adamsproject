<nav class="navbar-elegant" id="navbar-main">
    <div class="navbar-inner">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="navbar-logo" aria-label="Beranda">
            <img src="{{ asset('media/' . $logo->profile_image) }}" alt="Adam Dustin Bhakti">
        </a>

        <!-- Desktop Links -->
        <div class="navbar-links">
            <a href="{{ route('home') }}"
               class="navbar-link {{ request()->is('/') ? 'active' : '' }}">
                Beranda
            </a>
            <a href="{{ route('profil') }}"
               class="navbar-link {{ request()->is('Profil') ? 'active' : '' }}">
                Profil
            </a>
            <a href="{{ route('berita') }}"
               class="navbar-link {{ request()->is('Berita') ? 'active' : '' }}">
                Berita
            </a>
            <a href="{{ route('galery') }}"
               class="navbar-link {{ request()->is('galery') ? 'active' : '' }}">
                Galeri
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
        <a href="{{ route('home') }}"
           class="navbar-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
        <a href="{{ route('profil') }}"
           class="navbar-link {{ request()->is('Profil') ? 'active' : '' }}">Profil</a>
        <a href="{{ route('berita') }}"
           class="navbar-link {{ request()->is('Berita') ? 'active' : '' }}">Berita</a>
        <a href="{{ route('galery') }}"
           class="navbar-link {{ request()->is('galery') ? 'active' : '' }}">Galeri</a>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const btn = document.getElementById('hamburger-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                const open = menu.classList.toggle('open');
                btn.classList.toggle('active', open);
                btn.setAttribute('aria-expanded', open ? 'true' : 'false');
            });
        }
    });
</script>
