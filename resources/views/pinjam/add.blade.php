@extends('layouts.main')

@section('content')

{{-- 1. BACKGROUND FIXED --}}
<div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
     style="background-image: url('{{ asset('images/Library2.jpg') }}');">
</div>
<div class="fixed inset-0 -z-10 bg-slate-900/80 backdrop-blur-[4px]"></div>

{{-- 2. WRAPPER UTAMA --}}
<div class="min-h-screen flex items-center justify-center p-4">
    
    {{-- KARTU FORM (Dark Glass) --}}
    <div class="w-full max-w-2xl bg-slate-900/60 backdrop-blur-md border border-white/10 rounded-2xl shadow-2xl overflow-hidden">
        
        {{-- Header Form --}}
        <div class="px-8 py-6 border-b border-white/10 bg-white/5 flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold font-serif text-white">
                    Transaksi Peminjaman
                </h2>
                <p class="text-slate-400 text-sm mt-1">Catat peminjaman buku baru.</p>
            </div>
            {{-- Icon Transaksi (Clipboard) --}}
            <div class="w-10 h-10 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                </svg>
            </div>
        </div>

        <div class="p-8">
            
            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-200 text-sm animate-pulse">
                    <div class="flex items-center gap-2 mb-2 font-bold text-rose-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        Terjadi Kesalahan
                    </div>
                    <ul class="list-disc list-inside space-y-1 ml-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 px-4 py-3 rounded-lg bg-rose-600/20 border border-rose-500/40 text-rose-300 text-sm shadow shadow-rose-900/20">
                    <strong class="font-semibold">Peringatan:</strong> {{ session('error') }}
                </div>
            @endif

            {{-- Form Start --}}
            <form action="{{ url('pinjam/save') }}" method="POST" accept-charset='UTF-8' class="space-y-6">
                @csrf
                
                {{-- Select Anggota --}}
                <div class="group">
                    <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-emerald-400 transition-colors">Pilih Anggota</label>
                    <div class="relative">
                        <select name="anggota_id" 
                                class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected>-- Cari Nama Anggota --</option>
                            @foreach ($query['anggota'] as $anggota)
                                <option value="{{ $anggota->ID_Anggota }}" {{ old('anggota_id') == $anggota->ID_Anggota ? 'selected' : '' }} class="bg-slate-800 text-white">
                                    {{ $anggota->nim }} - {{ $anggota->nama }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                {{-- Select Buku --}}
                <div class="group">
                    <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-emerald-400 transition-colors">Pilih Buku</label>
                    <div class="relative">
                        <select name="buku_id" 
                                class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected>-- Cari Judul Buku --</option>
                            @foreach ($query['buku'] as $buku)
                                <option value="{{ $buku->ID_Buku }}" class="bg-slate-800 text-white">
                                    {{ $buku->Judul }} - {{ $buku->Pengarang }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                {{-- Grid Tanggal (2 Kolom) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Tgl Pinjam --}}
                    <div class="group">
                        <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-emerald-400 transition-colors">Tanggal Peminjaman</label>
                        <input type="date" name="tgl_pinjam" 
                               class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all [color-scheme:dark]" />
                    </div>

                    {{-- Tgl Kembali --}}
                    <div class="group">
                        <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-emerald-400 transition-colors">Tanggal Pengembalian</label>
                        <input type="date" name="tgl_kembali" 
                               class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all [color-scheme:dark]" />
                    </div>

                </div>

                {{-- Footer Action Buttons --}}
                <div class="pt-6 flex flex-col-reverse sm:flex-row items-center justify-end gap-3 sm:gap-4 border-t border-white/10 mt-8">
                    
                    <a href="{{ url('pinjam') }}" 
                       class="w-full sm:w-auto px-6 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-white/5 text-center font-medium transition-all duration-200">
                       Kembali
                    </a>

                    <input type="reset" 
                           name="btn_batal" 
                           value="Reset Form"
                           class="w-full sm:w-auto px-6 py-3 rounded-lg border border-white/10 text-slate-300 hover:bg-white/5 hover:text-white text-center font-medium transition-all duration-200 cursor-pointer" />

                    <button type="submit" 
                            name="btn_simpan" 
                            value="Pinjam"
                            class="w-full sm:w-auto px-8 py-3 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white font-bold shadow-lg shadow-emerald-500/20 hover:shadow-emerald-500/40 transform hover:-translate-y-0.5 transition-all duration-200">
                        Proses Peminjaman
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection