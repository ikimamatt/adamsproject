<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Adam Dustin Bhakti — Pengusaha muda inspiratif dari Balikpapan, Kalimantan Timur. CEO Lexa Event, Ketua HIPMI, dan pelopor ekonomi kreatif.">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    @vite('resources/css/app.css')
    <title>Adam Dustin Bhakti — Perintis Harapan dari Kalimantan Timur</title>
</head>
<body>
    @include('Layout.Navbar')

    {{-- ============================================================
         HERO / JUMBOTRON
    ============================================================ --}}
    <section class="hero-section" id="beranda">
        {{-- Background image --}}
        <img src="{{ asset('media/' . $jumbotron->background_image) }}"
             alt="" class="hero-bg-image" aria-hidden="true">
        <div class="hero-overlay" aria-hidden="true"></div>

        {{-- Teks kiri --}}
        <div class="hero-content animate-fadeup">
            <p class="hero-eyebrow">Pengusaha &amp; Tokoh Muda Kalimantan</p>
            <h1 class="hero-name">Adam<br>Dustin<br>Bhakti</h1>
            <p class="hero-tagline">&ldquo;{{ trim($jumbotron->text_left, " \t\n\r\0\x0B\"'“”") }}&rdquo;</p>
            <a href="{{ route('profil') }}" class="btn-elegant-white">Mengenal Adam</a>
        </div>

        {{-- Foto profil --}}
        <img src="{{ asset('media/' . $jumbotron->profile_image) }}"
             alt="Adam Dustin Bhakti"
             class="hero-profile-image">

        {{-- Kutipan kanan --}}
        <div class="hero-right-text animate-fadein delay-300">
            <p>{{ $jumbotron->text_right }}</p>
        </div>
    </section>

    {{-- ============================================================
         FEATURED NEWS STRIP
    ============================================================ --}}
    @if($featuredNews->count() > 0)
    <div class="featured-strip">
        <div class="featured-strip-inner">
            @foreach($featuredNews as $item)
            <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer" class="featured-strip-item">
                <span class="featured-strip-label">{{ $item->category }}</span>
                <p class="featured-strip-title">{{ $item->title }}</p>
                <p class="featured-strip-sub">{{ Str::limit($item->subtitle, 90) }}</p>
                <span class="featured-strip-arrow">&#8594;</span>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ============================================================
         INTRODUCTION / KENALAN ADAM
    ============================================================ --}}
    <div class="intro-section">
        <div class="intro-image-wrap">
            <span class="intro-image-deco" aria-hidden="true"></span>
            <img src="{{ asset('media/' . $introduction->image) }}"
                 alt="Adam Dustin Bhakti"
                 class="intro-image">
        </div>
        <div class="intro-content animate-fadeup delay-100">
            <p class="section-label">Mengenal Adam Dustin Bhakti</p>
            <span class="divider-line"></span>
            <h2 class="intro-heading">{{ $introduction->title }}</h2>
            <p class="intro-body">{{ $introduction->subtitle }}</p>
            <a href="{{ route('profil') }}" class="btn-elegant-filled" style="width:fit-content;">
                Baca Selengkapnya
            </a>
        </div>
    </div>

    {{-- ============================================================
         SOCIAL MEDIA
    ============================================================ --}}
    <div class="social-section">
        <h2 class="social-heading">Terhubung dengan Adam Dustin</h2>
        <div class="social-icons-row">
            @if(!empty($socialMedia->facebook))
            <a href="{{ $socialMedia->facebook }}" target="_blank" rel="noopener noreferrer" class="social-icon-item" aria-label="Facebook">
                <div class="social-icon-circle">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M9 8H6v4h3v12h5V12h3.642l.358-4h-4V6.333C14 5.374 14.556 5 15.627 5H18V0h-3.81C10.537 0 9 1.482 9 4.889V8z"/>
                    </svg>
                </div>
                <span class="social-icon-label">Facebook</span>
            </a>
            @endif

            @if(!empty($socialMedia->instagram))
            <a href="{{ $socialMedia->instagram }}" target="_blank" rel="noopener noreferrer" class="social-icon-item" aria-label="Instagram">
                <div class="social-icon-circle">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                    </svg>
                </div>
                <span class="social-icon-label">Instagram</span>
            </a>
            @endif

            @if(!empty($socialMedia->tiktok))
            <a href="{{ $socialMedia->tiktok }}" target="_blank" rel="noopener noreferrer" class="social-icon-item" aria-label="TikTok">
                <div class="social-icon-circle">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.298-.002.595.042.88.13V9.4a6.33 6.33 0 0 0-1-.08A6.34 6.34 0 0 0 3 15.66a6.34 6.34 0 0 0 10.82 4.49 6.27 6.27 0 0 0 1.83-4.49V8.69a8.18 8.18 0 0 0 4.79 1.51V6.74c-.28-.01-.58-.03-.85-.05z"/>
                    </svg>
                </div>
                <span class="social-icon-label">TikTok</span>
            </a>
            @endif
        </div>
    </div>

    {{-- ============================================================
         GALERI PREVIEW
    ============================================================ --}}
    <div class="gallery-section-dark">
        <div style="max-width:1300px; margin:0 auto;">
            <p class="section-label">Dokumentasi</p>
            <span class="divider-line" style="background:rgba(255,255,255,0.25);"></span>
            <h2 class="section-title" style="color:var(--color-white); margin-top:0.5rem;">Galeri Adam Dustin</h2>
        </div>
        <div style="max-width:1300px; margin:2.5rem auto 0; display:flex; overflow-x:auto; gap:1rem; scrollbar-width:none;">
            <img src="/img/lexa.png" alt="Galeri" style="width:280px; height:280px; object-fit:cover; flex-shrink:0; filter:grayscale(25%);">
            <div style="width:280px; height:280px; flex-shrink:0; background:var(--color-charcoal); display:flex; flex-direction:column; align-items:center; justify-content:center; gap:1rem;">
                <p style="color:rgba(255,255,255,0.7); font-family:var(--font-serif); font-size:1rem; text-align:center; padding:0 1.5rem; line-height:1.6;">Dan banyak momen lainnya bersama Adam</p>
                <a href="{{ route('galery') }}" class="btn-elegant-white" style="font-size:0.7rem; padding:0.5rem 1.5rem;">Lihat Galeri</a>
            </div>
        </div>
    </div>

    {{-- ============================================================
         BERITA TERKINI
    ============================================================ --}}
    <div class="news-section">
        <div class="section-header">
            <p class="section-label">Berita Adam</p>
            <span class="divider-line"></span>
            <h2 class="section-title">Ikut Keseharian Adam Dustin</h2>
        </div>

        <div class="news-grid">
            @foreach ($allnews->take(6) as $news)
            <a href="{{ $news->link }}" target="_blank" rel="noopener noreferrer" class="news-card">
                <div class="news-card-img-wrap">
                    <img src="{{ asset('media/' . $news->image) }}"
                         alt="{{ $news->title }}"
                         class="news-card-img">
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
