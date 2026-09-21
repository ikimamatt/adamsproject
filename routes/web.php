<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JumbotronController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignatureNewsController;
use App\Http\Controllers\IntroductionController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\videosController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SocialMediaController;

Route::get('/test', function () {
    return view('admin.index');
})->name('admin.test');
// Rute autentikasi
Route::get('/login-dashboard-adb', [AuthController::class, 'showLoginForm'])->name('login'); //login
Route::post('/login-dashboard-adb', [AuthController::class, 'login']); //login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




// Rute pengunjung (tidak perlu login)
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/Berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/Profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/galery', [HomeController::class, 'galery'])->name('galery');

// Rute admin (protected)
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::resource('social-media', SocialMediaController::class)->only(['index', 'store', 'destroy']);
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // Route::get('/news', function () {
    //     return view('admin.news');
    // })->name('admin.new');
    // Route::resource('jumbotron', JumbotronController::class);
    Route::resource('news', NewsController::class);
    Route::resource('introduction', IntroductionController::class);
    Route::get('/introduction', [IntroductionController::class, 'index'])->name('introduction.index');
    Route::resource('signaturenews', SignatureNewsController::class);
    Route::get('/introduction', [IntroductionController::class, 'index'])->name('introduction');
    Route::post('/news/feature', [SignatureNewsController::class, 'featureNews'])->name('news.featureNews');
    Route::post('news/feature', [SignatureNewsController::class, 'featureNews'])->name('news.featureNews');
    Route::put('signaturenews/{news}/edit', [SignatureNewsController::class, 'update'])->name('signaturenews.update');
    Route::delete('/signaturenews/{news}', [SignatureNewsController::class, 'destroy'])->name('signaturenews.destroy');
    Route::post('news/store', [SignatureNewsController::class, 'store'])->name('news.store');
    Route::get('/jumbotron', [JumbotronController::class, 'index'])->name('jumbotron.index');
    Route::get('jumbotron/create', [JumbotronController::class, 'create'])->name('jumbotron.create');
    Route::post('jumbotron', [JumbotronController::class, 'store'])->name('jumbotron.store');
    Route::get('jumbotron/{id}/edit', [JumbotronController::class, 'edit'])->name('jumbotron.edit');
    Route::put('jumbotron/{id}', [JumbotronController::class, 'update'])->name('jumbotron.update');
    Route::delete('jumbotron/{id}', [JumbotronController::class, 'destroy'])->name('jumbotron.destroy');
    Route::get('/quote', [QuoteController::class, 'index'])->name('quote.index');
    Route::get('/video', [videosController::class, 'index'])->name('video.index');
    Route::get('/admin/video/{id}/edit', [videosController::class, 'edit'])->name('video.edit'); // Menampilkan halaman edit
    Route::put('/admin/video/{id}', [videosController::class, 'update'])->name('video.update'); // Menangani update

    Route::get('/logo', [LogoController::class, 'index'])->name('logo.index');
    Route::put('/logo', [LogoController::class, 'update'])->name('logo.update');

    Route::get('/quote/{id}/edit', [QuoteController::class, 'edit'])->name('quote.edit');
    Route::put('/quote/{id}', [QuoteController::class, 'update'])->name('quote.update');
    Route::put('/admin/quote-detail/update', [QuoteController::class, 'updateQuoteDetail'])->name('admin.quoteDetail.updateQuoteDetail');

    Route::resource('gallery', GalleryController::class);



});



