<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Profil Adam Dustin Bhakti — CEO Lexa Event, Ketua HIPMI Balikpapan, dan tokoh muda penggerak ekonomi Kalimantan Timur.">
    @vite('resources/css/app.css')
    <title>Profil — Adam Dustin Bhakti</title>
</head>
<body>
    @include('Layout.Navbar')

    {{-- PAGE HERO --}}
    <div class="page-hero">
        <img src="/img/org3.png" alt="" class="page-hero-figure" aria-hidden="true">
        <div class="page-hero-gradient" aria-hidden="true"></div>
        <div class="page-hero-content animate-fadeup">
            <p class="page-hero-eyebrow">Mengenal Lebih Dekat</p>
            <h1 class="page-hero-title">Profil</h1>
            <p class="page-hero-sub">Adam Dustin Bhakti</p>
        </div>
    </div>

    {{-- BIOGRAFI --}}
    <div class="profil-bio-section">
        {{-- Gambar --}}
        <div class="profil-bio-image-wrap">
            <span class="profil-bio-deco" aria-hidden="true"></span>
            <img src="/img/profil1.png" alt="Adam Dustin Bhakti" class="profil-bio-image">
        </div>

        {{-- Konten teks --}}
        <div class="profil-bio-content animate-fadeup delay-100">
            <p class="profil-bio-label">Mengenal Adam Dustin Bhakti</p>
            <span class="divider-line"></span>
            <h2 class="profil-bio-heading">Saya Adam Dustin Bhakti,<br>Perintis Harapan dari Kalimantan Timur</h2>

            <p class="profil-bio-p">
                Saya lahir dan besar di Balikpapan, kota yang membentuk karakter, mimpi, dan semangat perjuangan saya. Dari kota ini, saya belajar bahwa menjadi besar tidak harus menunggu datangnya kesempatan, tapi menciptakan sendiri jalan menuju masa depan.
            </p>
            <p class="profil-bio-p">
                Saya memulai perjalanan sebagai pengusaha lokal, dan perlahan membuktikan bahwa karya dari daerah pun bisa bersaing di tingkat nasional. Sebagai CEO Lexa Event, saya tidak hanya membangun perusahaan, tapi membangun ekosistem. Bersama tim, kami menjadikan Lexa sebagai ruang kolaborasi lintas sektor, dari event kreatif, pengembangan talenta muda, hingga pemberdayaan UMKM yang menjadi tulang punggung ekonomi bangsa.
            </p>
            <p class="profil-bio-p">
                Saya percaya bahwa tidak ada yang tidak mungkin, selama kita memiliki mindset yang benar, konsistensi dalam melangkah, dan keberanian untuk bekerja keras tanpa henti. Prinsip ini pula yang saya bawa saat dipercaya menjadi Ketua HIPMI dan Ketua ESI Balikpapan, dua ruang yang saya gunakan untuk membina kewirausahaan dan memajukan ekonomi kreatif.
            </p>
            <p class="profil-bio-p">
                Saya tidak mengejar sorotan. Saya memilih menjadi perintis, membuka jalan, membangun ekosistem, dan menjadi jembatan antara mimpi masyarakat dan masa depan yang lebih baik.
            </p>

            <blockquote class="profil-bio-quote">
                &ldquo;Saya hanya ingin menjadi seseorang yang bisa diandalkan &mdash; yang menjadikan harapan sebagai kenyataan, lewat kerja nyata.&rdquo;
            </blockquote>

            <p class="profil-bio-p">
                Karena saya percaya: mimpi adalah tanggung jawab, dan harapan adalah janji yang harus ditepati. Inilah alasan saya terus melangkah, selama masih ada usaha kecil yang butuh dukungan, generasi muda yang butuh ruang, dan masyarakat yang pantas mendapatkan masa depan yang lebih baik.
            </p>

            <a href="{{ route('berita') }}" class="btn-elegant" style="width:fit-content; margin-top:1rem;">
                Lihat Kegiatan
            </a>
        </div>
    </div>

    {{-- SOCIAL MEDIA --}}
    <div class="social-section">
        <h2 class="social-heading">Terhubung dengan Adam Dustin</h2>
        <div class="social-icons-row">
            <a href="{{ $socialMedia->facebook }}" target="_blank" class="social-icon-item" aria-label="Facebook">
                <div class="social-icon-circle">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M9 8H6v4h3v12h5V12h3.642l.358-4h-4V6.333C14 5.374 14.556 5 15.627 5H18V0h-3.81C10.537 0 9 1.482 9 4.889V8z"/>
                    </svg>
                </div>
                <span class="social-icon-label">Facebook</span>
            </a>
            <a href="{{ $socialMedia->instagram }}" target="_blank" class="social-icon-item" aria-label="Instagram">
                <div class="social-icon-circle">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                    </svg>
                </div>
                <span class="social-icon-label">Instagram</span>
            </a>
            <a href="{{ $socialMedia->tiktok }}" target="_blank" class="social-icon-item" aria-label="TikTok">
                <div class="social-icon-circle">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 0 0-1-.08A6.34 6.34 0 0 0 3 15.66a6.34 6.34 0 0 0 10.82 4.49 6.27 6.27 0 0 0 1.83-4.49V8.69a8.18 8.18 0 0 0 4.79 1.51V6.74c-.28-.01-.58-.03-.85-.05z"/>
                    </svg>
                </div>
                <span class="social-icon-label">TikTok</span>
            </a>
        </div>
    </div>

    {{-- BERITA TERKAIT --}}
    <div class="news-section">
        <div class="section-header">
            <p class="section-label">Berita Adam</p>
            <span class="divider-line"></span>
            <h2 class="section-title">Ikut Keseharian Adam Dustin</h2>
        </div>
        <div class="news-grid">
            @foreach ($allnews->take(6) as $news)
            <a href="{{ $news->link }}" target="_blank" class="news-card">
                <div class="news-card-img-wrap">
                    <img src="{{ asset('media/' . $news->image) }}"
                         alt="{{ $news->title }}" class="news-card-img">
                    <div class="news-card-overlay" aria-hidden="true"></div>
                    <div class="news-card-body">
                        <span class="news-card-category">{{ $news->category }}</span>
                        <p class="news-card-title">{{ $news->title }}</p>
                        <p class="news-card-sub">{{ $news->subtitle }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="news-read-more-row">
            <a href="{{ route('berita') }}" class="btn-elegant">Lihat Semua Berita</a>
        </div>
    </div>

    @include('Layout.Footer')
</body>
</html>
