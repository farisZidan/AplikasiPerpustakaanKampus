<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Perpustakaan' }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased selection:bg-primary selection:text-white flex flex-col min-h-screen">

{{-- NAVBAR --}}
<nav class="sticky top-0 z-50 w-full
            bg-slate-900/80 backdrop-blur-md
            border-b border-white/5
            shadow-lg shadow-black/20
            text-slate-100 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            {{-- KIRI: Logo & Menu Utama --}}
            <div class="flex items-center gap-8">
                {{-- Logo --}}
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer"
                     onclick="window.location='{{ url('/') }}'">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center text-white shadow-lg shadow-primary/40">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                             class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                        </svg>
                    </div>
                    <span class="font-serif font-bold text-xl tracking-tight text-slate-50">
                        Perpus<span class="text-primary">Kampus</span>
                    </span>
                </div>

                {{-- Menu Desktop --}}
                <div class="hidden md:flex space-x-1">
                    <a href="{{ url('buku') }}"
                       class="px-3 py-2 rounded-md text-sm transition-all
                              {{ request()->is('buku*')
                                    ? 'bg-white/10 text-white font-semibold shadow-inner'
                                    : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Koleksi Buku
                    </a>
                    <a href="{{ url('anggota') }}"
                       class="px-3 py-2 rounded-md text-sm transition-all
                              {{ request()->is('anggota*')
                                    ? 'bg-white/10 text-white font-semibold shadow-inner'
                                    : 'text-slate-300 hover:text-white hover:bg:white/5' }}">
                        Anggota
                    </a>
                    <a href="{{ url('pinjam') }}"
                       class="px-3 py-2 rounded-md text-sm transition-all
                              {{ request()->is('pinjam*')
                                    ? 'bg-white/10 text-white font-semibold shadow-inner'
                                    : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Peminjaman
                    </a>
                </div>
            </div>

            {{-- KANAN: Profil Dropdown --}}
            <div class="flex items-center">
                <div class="relative ml-3">
                    <button type="button"
                            onclick="document.getElementById('profile-dropdown').classList.toggle('hidden')" 
                            class="flex items-center gap-3 focus:outline-none group">
                        
                        <div class="text-right hidden sm:block">
                            <p class="text-sm font-bold font-serif text-slate-100 group-hover:text-primary transition-colors">
                                {{ auth()->user()->username ?? 'Guest' }}
                            </p>
                            <p class="text-[10px] uppercase tracking-wider text-slate-400 font-medium">
                                {{ auth()->check() ? 'Petugas' : 'Pengunjung' }}
                            </p>
                        </div>
                        
                        <div class="h-9 w-9 rounded-full bg-gradient-to-br from-primary to-purple-600
                                    flex items-center justify-center text-white font-bold shadow-md text-sm
                                    ring-2 ring-primary/30 group-hover:ring-primary/60 transition-all">
                            {{ substr(auth()->user()->username ?? 'G', 0, 1) }}
                        </div>
                    </button>

                    <div id="profile-dropdown"
                         class="hidden absolute right-0 mt-2 w-56 bg-slate-900/95 text-slate-100
                                rounded-xl shadow-2xl shadow-black/40 py-1 border border-white/10
                                z-50 backdrop-blur">
                        
                        @auth
                            <div class="px-4 py-3 border-b border-white/10">
                                <p class="text-xs text-slate-400">Login sebagai</p>
                                <p class="text-sm font-bold text-slate-50 truncate">
                                    {{ auth()->user()->username }}
                                </p>
                            </div>

                            <form method="POST" action="{{ url('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm
                                               text-rose-400 hover:bg-rose-500/10 hover:text-rose-300
                                               transition-colors">
                                    <div class="flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>
                                        Keluar Aplikasi
                                    </div>
                                </button>
                            </form>
                        @else
                            <a href="{{ url('login') }}"
                               class="block px-4 py-2 text-sm text-slate-100
                                      hover:bg-white/10 hover:text-primary transition-colors">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke-width="1.5"
                                         stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                    Masuk / Login
                                </div>
                            </a>
                        @endauth

                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>


    {{-- KONTEN UTAMA --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-slate-900 text-slate-400 border-t border-slate-800 py-8 relative z-10">
        <div class="max-w-7xl mx-auto px-4 text-center md:text-left flex flex-col md:flex-row justify-between items-center">
            <div>
                <p class="font-serif text-slate-200">&copy; 2025 <span class="text-primary">PerpusKampus</span>.</p>
                <p class="text-xs mt-1 opacity-60">Sistem Informasi Perpustakaan Digital</p>
            </div>
            <div class="flex gap-6 text-xs font-medium uppercase tracking-widest mt-4 md:mt-0">
                <a href="#" class="hover:text-white transition-colors">Privacy</a>
                <a href="#" class="hover:text-white transition-colors">Terms</a>
            </div>
        </div>
    </footer>

    {{-- Script Sederhana: Klik di luar menu untuk menutup dropdown --}}
    <script>
        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById('profile-dropdown');
            var button = event.target.closest('button');
            
            // Jika yang diklik BUKAN tombol trigger dan BUKAN dropdown itu sendiri
            if (!button && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>

</body>
</html>