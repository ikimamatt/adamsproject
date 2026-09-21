<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    <footer class="bg-black w-full text-white relative p-8 md:p-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-10">
            <!-- Logo Section -->
            <div class="flex flex-col items-center md:items-start">
                {{-- <p class="italic text-2xl font-bold mb-4 text-center md:text-left">LOGO</p> --}}
                <img src="{{ asset('storage/' . $logo->profile_image) }}" alt="Profile Image" width="100" class="img-thumbnail mb-4">

                <p class="font-thin text-xs text-center md:text-left">Adam Dustin Bhakti</p>
            </div>

            <!-- Social Media Section -->
            <div class="flex flex-col items-center md:items-start">
                <p class="font-semibold text-lg underline underline-offset-8 mb-4">Social Media</p>
               <div class="flex flex-col font-thin text-sm gap-4">
                    <a href="{{ $socialMedia->instagram }}" target="_blank" class="hover:text-gray-400">Instagram</a>
                    <a href="{{ $socialMedia->facebook }}" target="_blank" class="hover:text-gray-400">Facebook</a>
                    <a href="{{ $socialMedia->tiktok }}" target="_blank" class="hover:text-gray-400">Tiktok</a>
                </div>
            </div>

            <!-- Profile Section -->
            <div class="flex flex-col items-center md:items-start">
                <p class="font-semibold text-lg underline underline-offset-8 mb-4">Profil</p>
                <div class="flex flex-col font-thin text-sm gap-4">
                    <a href="{{ route('profil') }}" class="hover:text-gray-400">Profil</a>
                    {{-- <a href="" class="hover:text-gray-400">Berita</a>
                    <a href="" class="hover:text-gray-400">Dokumentasi</a> --}}
                </div>
            </div>

            <!-- Activity Section -->
            <div class="flex flex-col items-center md:items-start">
                <p class="font-semibold text-lg underline underline-offset-8 mb-4">Kegiatan</p>
                <div class="flex flex-col font-thin text-sm gap-4">
                    <a href="{{ route('berita') }}" class="hover:text-gray-400">Berita</a>
                    <a href="{{ route('galery') }}" class="hover:text-gray-400">Galeri</a>
                    {{-- <a href="" class="hover:text-gray-400">Video</a> --}}
                </div>
            </div>

            <!-- Contact Section -->
            {{-- <div class="flex flex-col items-center md:items-start">
                <p class="font-semibold text-lg underline underline-offset-8 mb-4">Hubungi</p>
                <div class="flex flex-col font-thin text-sm gap-4">
                    <a href="" class="hover:text-gray-400">Alamat</a>
                    <a href="" class="hover:text-gray-400">No. HP</a>
                </div>
            </div> --}}
        </div>

        <!-- Copyright Section -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-xs font-thin text-center md:text-left md:static">
            @2024 .com All Rights Reserved
        </div>
    </footer>
</body>

</html>
