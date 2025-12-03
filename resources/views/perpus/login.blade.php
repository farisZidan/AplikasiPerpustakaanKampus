<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login - PerpusKampus' }}</title>
    
    {{-- Memanggil CSS Utama --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    {{-- WRAPPER UTAMA: Full Screen & Center --}}
    <div class="min-h-screen flex items-center justify-center p-4 relative">
        
        {{-- 1. Background Image Fixed --}}
        <div class="absolute inset-0 bg-cover bg-center" 
             style="background-image: url('{{ asset('images/Library2.jpg') }}');">
        </div>

        {{-- 2. Overlay Gelap (Agar teks kontras) --}}
        <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-[4px]"></div>

        {{-- 3. CARD LOGIN (Glassmorphism Dark) --}}
        <div class="relative z-10 w-full max-w-md
                    bg-slate-900/80 backdrop-blur-xl
                    rounded-2xl shadow-2xl overflow-hidden
                    border border-white/15 text-slate-50">
            
            {{-- Header Card --}}
            <div class="px-8 pt-8 pb-6 text-center
                        bg-gradient-to-b from-slate-900/80 via-slate-900/70 to-slate-900/40
                        border-b border-white/10">
                {{-- Logo Icon --}}
                <div class="mx-auto w-12 h-12 bg-primary rounded-xl flex items-center justify-center text-white shadow-lg shadow-primary/40 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                </div>
                
                <h2 class="text-3xl font-bold font-serif text-slate-50">Selamat Datang</h2>
                <p class="text-slate-400 text-sm mt-2">Silakan login untuk mengakses sistem perpustakaan.</p>
            </div>

            {{-- Alert Error (Muncul jika login gagal) --}}
            @if(session('error'))
                <div class="mx-8 mt-4 bg-rose-500/10 border-l-4 border-rose-500 text-rose-100 p-4 text-sm rounded-r">
                    <p class="font-bold">Gagal Masuk</p>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            {{-- Form Section --}}
            <div class="px-8 pb-8 pt-6 space-y-5">
                <form action="{{ url('login') }}" method="POST" accept-charset="UTF-8" class="space-y-5">
                    @csrf
                    
                    {{-- Input Username --}}
                    <div>
                        <label for="username" class="block text-sm font-semibold text-slate-100 mb-1">Username</label>
                        <input type="text" id="username" name="username" required autofocus
                               class="w-full px-4 py-3 rounded-lg bg-slate-900/60 border border-slate-600 text-slate-50
                                      focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none
                                      placeholder-slate-500"
                               placeholder="Masukkan username anda">
                    </div>

                    {{-- Input Password --}}
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <label for="password" class="block text-sm font-semibold text-slate-100">Password</label>
                            {{-- Link Lupa Password (Opsional/Hiasan) --}}
                            <a href="#" class="text-xs text-primary hover:text-primary-hover font-medium">Lupa password?</a>
                        </div>
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 rounded-lg bg-slate-900/60 border border-slate-600 text-slate-50
                                      focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none
                                      placeholder-slate-500"
                               placeholder="••••••••">
                    </div>

                    {{-- Tombol Login --}}
                    <button type="submit" 
                            class="w-full bg-primary hover:bg-primary-hover text-white font-bold py-3 rounded-lg
                                   shadow-lg shadow-primary/40 transition-all duration-300 transform hover:-translate-y-0.5 mt-2">
                        Masuk ke Aplikasi
                    </button>
                </form>
            </div>

            {{-- Footer Kecil di dalam Card --}}
            <div class="bg-slate-900/70 border-t border-white/10 px-8 py-4 text-center">
                <p class="text-xs text-slate-400">
                    &copy; 2025 PerpusKampus. All rights reserved.
                </p>
            </div>

        </div>
    </div>

</body>
</html>
