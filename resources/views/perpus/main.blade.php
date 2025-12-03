<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perpustakaan Digital' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="fixed inset-0 -z-20 bg-cover bg-center bg-no-repeat"
     style="background-image: url('{{ asset('images/Library2.jpg') }}');">
</div>

<div class="fixed inset-0 -z-10 bg-slate-900/60 backdrop-blur-[3px]"></div>

<div class="relative min-h-screen flex items-center justify-center p-4">
    
    <div class="w-full max-w-5xl text-center">
        
        {{-- Header Teks --}}
        <div class="mb-12 animate-fade-in-down">
            <span class="inline-block py-1 px-3 rounded-full bg-indigo-500/20 border border-indigo-400/30 text-indigo-200 text-xs font-bold tracking-widest uppercase mb-4 backdrop-blur-md">
                Sistem Informasi perpus kampus
            </span>
            <h1 class="text-5xl md:text-6xl font-serif font-bold text-white mb-4 drop-shadow-lg">
                Selamat Datang
            </h1>
            <p class="text-slate-300 text-lg font-light max-w-2xl mx-auto">
                Silakan pilih menu di bawah ini untuk mulai mengelola data perpustakaan digital kampus.
            </p>
        </div>

        {{-- Grid Menu Pilihan --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">

            {{-- 1. KARTU BUKU --}}
            <a href="{{ url('buku') }}" 
               class="group relative bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 hover:shadow-2xl hover:border-indigo-400/50 transition-all duration-300">
                
                <div class="w-16 h-16 mx-auto bg-indigo-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-indigo-300 transition-colors">Kelola Buku</h3>
                <p class="text-slate-300 text-sm">Tambah, edit, dan manajemen koleksi pustaka.</p>
            </a>

            {{-- 2. KARTU ANGGOTA --}}
            <a href="{{ url('anggota') }}" 
               class="group relative bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 hover:shadow-2xl hover:border-pink-400/50 transition-all duration-300">
                
                <div class="w-16 h-16 mx-auto bg-pink-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-pink-300 transition-colors">Data Anggota</h3>
                <p class="text-slate-300 text-sm">Manajemen data mahasiswa dan anggota perpustakaan.</p>
            </a>

            {{-- 3. KARTU TRANSAKSI --}}
            <a href="{{ url('pinjam') }}" 
               class="group relative bg-white/10 backdrop-blur-md border border-white/20 p-8 rounded-2xl hover:bg-white/20 hover:-translate-y-2 hover:shadow-2xl hover:border-emerald-400/50 transition-all duration-300">
                
                <div class="w-16 h-16 mx-auto bg-emerald-600 rounded-2xl flex items-center justify-center text-white mb-6 shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2 group-hover:text-emerald-300 transition-colors">Transaksi</h3>
                <p class="text-slate-300 text-sm">Pencatatan peminjaman dan pengembalian buku.</p>
            </a>

        </div>

        <div class="mt-12 text-slate-400 text-xs">
            &copy; 2025 PerpusKampus Project.
        </div>

    </div>
</div>
</body>
</html>