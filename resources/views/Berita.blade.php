<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Liputan dan berita terkini seputar kegiatan Adam Dustin Bhakti — pengusaha muda inspiratif dari Balikpapan.">
    @vite('resources/css/app.css')
    <title>Berita — Adam Dustin Bhakti</title>
</head>
<body>
    @include('Layout.Navbar')

    {{-- PAGE HERO --}}
    <div class="page-hero">
        <img src="/img/org3.png" alt="" class="page-hero-figure" aria-hidden="true">
        <div class="page-hero-gradient" aria-hidden="true"></div>
        <div class="page-hero-content animate-fadeup">
            <p class="page-hero-eyebrow">Liputan &amp; Kegiatan</p>
            <h1 class="page-hero-title">Berita</h1>
            <p class="page-hero-sub">Adam Dustin Bhakti</p>
        </div>
    </div>

    {{-- NEWS GRID --}}
    <div class="news-section-full">
        <div style="max-width:1300px; margin:0 auto;">
            <div class="section-header">
                <p class="section-label">Berita Terbaru</p>
                <span class="divider-line"></span>
                <h2 class="section-title">Ikut Keseharian Adam Dustin</h2>
            </div>

            <div class="news-list-grid">
                @foreach ($allnews as $news)
                <a href="{{ $news->link }}" target="_blank" class="news-card">
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
        </div>
    </div>

    @include('Layout.Footer')
</body>
</html>
