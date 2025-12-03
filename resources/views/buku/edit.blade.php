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
                    Edit Data Buku
                </h2>
                <p class="text-slate-400 text-sm mt-1">Perbarui informasi detail buku.</p>
            </div>
            {{-- Icon Buku (Indigo) --}}
            <div class="w-10 h-10 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
        </div>

        <div class="p-8">
            
            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-200 text-sm">
                    <div class="flex items-center gap-2 mb-2 font-bold text-rose-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        Terjadi Kesalahan Input
                    </div>
                    <ul class="list-disc list-inside space-y-1 ml-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Start --}}
            <form action="{{ url('buku/save') }}" method="POST" accept-charset='UTF-8' class="space-y-6">
                @csrf
                
                {{-- PERBAIKAN: Input ID --}}
                <input type="hidden" name="id" value="{{ $query->ID_Buku }}" />
                <input type="hidden" name="is_update" value="{{ $is_update }}" />

                {{-- Input Judul --}}
                <div class="group">
                    <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-indigo-400 transition-colors">Judul Buku</label>
                    <input type="text" name="Judul" 
                           {{-- Gunakan old() agar data tidak hilang saat validasi gagal --}}
                           value="{{ old('Judul', $query->Judul) }}" 
                           class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                           maxlength="100" />
                </div>

                {{-- Input Pengarang --}}
                <div class="group">
                    <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-indigo-400 transition-colors">Pengarang</label>
                    <input type="text" name="Pengarang" 
                           value="{{ old('Pengarang', $query->Pengarang) }}" 
                           class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                           maxlength="150" />
                </div>

                {{-- Select Kategori --}}
                <div class="group">
                    <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-indigo-400 transition-colors">Kategori</label>
                    <div class="relative">
                        <select name="Kategori" class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all appearance-none cursor-pointer">
                            @foreach ($optkategori as $key => $value)
                                <option value="{{ $key }}" class="bg-slate-800 text-white"
                                    {{-- Logic Selected: Cek old input, lalu cek database --}}
                                    {{ (old('Kategori', $query->Kategori) == $key) ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        {{-- Custom Arrow --}}
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                {{-- Footer Buttons --}}
                <div class="pt-6 flex flex-col-reverse sm:flex-row items-center justify-end gap-3 sm:gap-4 border-t border-white/10 mt-8">
                    <a href="{{ url('buku') }}" 
                       class="w-full sm:w-auto px-6 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-white/5 text-center font-medium transition-all duration-200">
                       Batal
                    </a>
                    <button type="submit" 
                            name="btn_simpan" 
                            value="Simpan"
                            class="w-full sm:w-auto px-8 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-bold shadow-lg shadow-indigo-500/20 hover:shadow-indigo-500/40 transform hover:-translate-y-0.5 transition-all duration-200">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection