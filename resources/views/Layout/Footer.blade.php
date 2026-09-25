<footer class="footer-elegant">
    <div class="footer-grid">
        <!-- Brand -->
        <div>
            <img src="{{ asset('media/' . $logo->profile_image) }}"
                 alt="Adam Dustin Bhakti"
                 class="footer-brand-logo">
            <p class="footer-brand-text">
                Pengusaha muda inspiratif dari Kalimantan Timur. Membangun ekosistem, mendorong pertumbuhan, dan menginspirasi generasi penerus bangsa.
            </p>
        </div>

        <!-- Social Media -->
        <div>
            <p class="footer-col-title">Sosial Media</p>
            <div class="footer-links">
                @if(!empty($socialMedia->instagram))
                <a href="{{ $socialMedia->instagram }}" target="_blank" rel="noopener noreferrer" class="footer-link">Instagram</a>
                @endif
                @if(!empty($socialMedia->facebook))
                <a href="{{ $socialMedia->facebook }}" target="_blank" rel="noopener noreferrer" class="footer-link">Facebook</a>
                @endif
                @if(!empty($socialMedia->tiktok))
                <a href="{{ $socialMedia->tiktok }}" target="_blank" rel="noopener noreferrer" class="footer-link">TikTok</a>
                @endif
            </div>
        </div>

        <!-- Navigasi -->
        <div>
            <p class="footer-col-title">Navigasi</p>
            <div class="footer-links">
                <a href="{{ route('home') }}" class="footer-link">Beranda</a>
                <a href="{{ route('profil') }}" class="footer-link">Profil</a>
                <a href="{{ route('berita') }}" class="footer-link">Berita</a>
                <a href="{{ route('galery') }}" class="footer-link">Galeri</a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p class="footer-copyright">&copy; {{ date('Y') }} Adam Dustin Bhakti. All rights reserved.</p>
        <p class="footer-copyright" style="text-align:right;">Balikpapan, Kalimantan Timur</p>
    </div>
</footer>
