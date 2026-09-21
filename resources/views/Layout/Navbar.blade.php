<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <title>Nav</title>
</head>
<body class="font-poppins">
    <nav class="w-full z-30 fixed bg-black drop-shadow-xl shadow-white">
        <div class="px-8 py-2 flex justify-between items-center">
          <!-- Logo / Judul -->
          <img src="{{ asset('storage/' . $logo->profile_image) }}" alt="Profile Image" width="100" class="img-thumbnail">

          <!-- Menu Desktop -->
          <div class="hidden sm:flex space-x-8 items-center text-white">
            <a
                href="{{ route('berita') }}"
                class="{{ request()->is('Berita') ? 'uppercase text-base bg-white text-black px-4 py-2 rounded-full' : 'uppercase text-base tracking-wide hover:text-sky-300 transition-colors duration-300 ease-in-out' }}"
            >
                Berita
            </a>
            <a
                href="{{ route('profil') }}"
                class="{{ request()->is('Profil') ? 'uppercase text-base bg-white text-black px-4 py-2 rounded-full' : 'uppercase text-base tracking-wide hover:text-sky-300 transition-colors duration-300 ease-in-out' }}"
            >
                Profil
            </a>
            <a
                href="{{ route('home') }}"
                class="{{ request()->is('/') ? 'uppercase text-base bg-white text-black px-4 py-2 rounded-full' : 'uppercase text-base tracking-wide hover:text-sky-300 transition-colors duration-300 ease-in-out' }}"
            >
                Beranda
            </a>
        </div>

          <!-- Tombol Hamburger (Mobile) -->
          <div class="sm:hidden relative z-10">
            <input
              type="checkbox"
              id="menu-toggle"
              class="hidden peer"
            />
            <label for="menu-toggle" class="cursor-pointer">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-8 h-8 text-white hover:text-sky-300 transition-colors duration-300 ease-in-out"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                />
              </svg>
            </label>

            <!-- Menu Mobile yang muncul setelah checkbox diaktifkan -->
            <div
              class="absolute right-0 mt-2 w-48 bg-slate-700 rounded-md shadow-lg
                     transform scale-y-0 origin-top transition-transform duration-300 ease-in-out
                     peer-checked:scale-y-100"
            >
            <ul class="flex flex-col text-center text-white py-4 space-y-4">
                <li>
                    <a
                        href="/Berita"
                        class="{{ request()->is('Berita') ? 'uppercase text-base bg-white text-black px-4 py-2 rounded-full block' : 'uppercase text-base tracking-wide block hover:text-sky-300 transition-colors duration-300 ease-in-out' }}"
                    >
                        Berita
                    </a>
                </li>
                <li>
                    <a
                        href="/Profil"
                        class="{{ request()->is('Profil') ? 'uppercase text-base bg-white text-black px-4 py-2 rounded-full block' : 'uppercase text-base tracking-wide block hover:text-sky-300 transition-colors duration-300 ease-in-out' }}"
                    >
                        Profil
                    </a>
                </li>
                <li>
                    <a
                        href="/"
                        class="{{ request()->is('/') ? 'uppercase text-base bg-white text-black px-4 py-2 rounded-full block' : 'uppercase text-base tracking-wide block hover:text-sky-300 transition-colors duration-300 ease-in-out' }}"
                    >
                        Beranda
                    </a>
                </li>
            </ul>

            </div>
          </div>
        </div>
      </nav>  </body>

</html>
