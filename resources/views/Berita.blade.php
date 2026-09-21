<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>News</title>
    <style>
        /* Class untuk gambar yang digeser ke kanan */
    .img-shift-right {
        transform: translateX(20px); /* Geser gambar ke kanan */
    }

    /* Class untuk teks yang digeser ke kiri */
    .text-shift-left {
        margin-left: 20px; /* Geser teks ke kiri */
    }

    /* Optional: Adjust padding for mobile view */
    .padding-mobile {
        padding-left: 20px;
    }
    .max-w {
            width: 120px;
        }
    </style>
</head>

<body>
    @include('Layout.Navbar')

    <div class="w-full overflow-x-hidden">
        {{-- #1 --}}
        <div class="bg-gradient-to-t from-black to-gray-400 h-[400px] xl:h-[600px] relative">
            <div class="bg-gradient-to-b from-black text-white h-full w-188 sm:w-1/2 left-16 absolute top-0 text-shift-left">
                <p class="ml-1 mt-56 xl:mt-72 font-bold text-4xl xl:text-4xl">Kegiatan</p>
                <p class="ml-1 font-thin mt-2">ADAM DUSTIN BHAKTI</p>
            </div>
            <img src="/img/org3.png" alt="" class="w-[400px] sm:w-[430px] lg:w-[450px] xl:w-[650px] absolute bottom-0 -right-10 md:right-20 lg:right-36 xl:right-72 img-shift-right">
        </div>

        {{-- <div class="p-16 xl:px-32 padding-mobile">
            <div class="flex">
                <input type="text" name="" id="" placeholder="Cari Berita..."
                    class="text-white w-full p-3 placeholder:text-white placeholder:italic rounded-l-full bg-gradient-to-r from-black to-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 p-2 rounded-r-full my-auto bg-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>
        </div> --}}

        {{-- #3 --}}
        <div class="pt-24">
            <p class="italic text-base px-16 xl:px-32">BERITA ADAM...</p>
            <p class="font-semibold text-3xl px-16 xl:px-32">Ikut keseharian Adam Dustin</p>
            <p class="bg-black w-20 mt-3 h-1 rounded-lg ml-16 xl:ml-32"></p>
            <div class="flex flex-wrap j gap-x-10 justify-center mb-10">
            @foreach ($allnews as $news)
                <a href="{{ $news->link }}"
                    class="mt-10 relative overflow-hidden rounded-md shadow-md w-80 lg:w-96 xl:w-[550px] scale-100 hover:scale-105 transition ease-in-out duration-200">
                    <div>
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" alt="" class="w-80 lg:w-96 xl:w-[550px]">
                        <div class="absolute bg-gradient-to-t from-gray-800 opacity-80 text-white p-2 bottom-0">
                            <p
                                class="text-xs lg:text-base max-w text-center rounded-sm px-2 p-1 text-black bg-white ">
                                {{ $news->category }}</p>
                            <p class="font-bold text-sm lg:text-lg">{{ $news->title }}</p>
                            <p class="font-thin text-xs lg:text-sm ">{{ $news->subtitle }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
        {{-- #9 --}}
        <div class="w-full mb-10 p-16 xl:px-32">
            <div class="bg-black w-full h-52">

            </div>
        </div>
    </div>
    @include('Layout.Footer')
</body>

</html>
