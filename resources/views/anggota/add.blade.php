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
                    {{ $is_update ? 'Edit Data Anggota' : 'Registrasi Anggota Baru' }}
                </h2>
                <p class="text-slate-400 text-sm mt-1">Lengkapi biodata anggota perpustakaan.</p>
            </div>
            {{-- Icon Anggota (User Group) --}}
            <div class="w-10 h-10 rounded-lg bg-pink-500/20 flex items-center justify-center text-pink-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
        </div>

        <div class="p-8">
            
            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-rose-500/10 border border-rose-500/20 text-rose-200 text-sm animate-pulse">
                    <div class="flex items-center gap-2 mb-2 font-bold text-rose-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                        Mohon Periksa Inputan Anda
                    </div>
                    <ul class="list-disc list-inside space-y-1 ml-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Start --}}
            <form action="{{ url('anggota/save') }}" method="POST" class="space-y-6">
                @csrf
                
                {{-- Hidden Inputs --}}
                <input type="hidden" name="id" value="{{ $is_update ? ($query->ID_Anggota ?? '') : '' }}" />
                <input type="hidden" name="is_update" value="{{ $is_update }}" />

                {{-- Input NIM --}}
                <div class="group">
                    <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-pink-400 transition-colors">NIM (Nomor Induk Mahasiswa)</label>
                    <input type="text" 
                           name="nim" 
                           {{-- Logic: Cek Old Input -> Cek Database (Edit) -> Kosong --}}
                           value="{{ old('nim', $is_update ? ($query->nim ?? '') : '') }}" 
                           class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all font-mono"
                           placeholder="Contoh: G.211.24.0001"
                           maxlength="20" />
                </div>

                {{-- Input Nama --}}
                <div class="group">
                    <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-pink-400 transition-colors">Nama Lengkap</label>
                    <input type="text" 
                           name="nama" 
                           value="{{ old('nama', $is_update ? ($query->nama ?? '') : '') }}" 
                           class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all"
                           placeholder="Masukkan nama lengkap anggota..."
                           maxlength="150" />
                </div>

                {{-- Select Progdi --}}
                <div class="group">
                    <label class="block text-sm font-medium text-slate-300 mb-2 group-focus-within:text-pink-400 transition-colors">Program Studi</label>
                    <div class="relative">
                        <select name="progdi" 
                                class="w-full px-4 py-3 rounded-lg bg-slate-800/50 border border-white/10 text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all appearance-none cursor-pointer">
                            
                            <option value="" disabled {{ old('progdi', $is_update ? ($query->progdi ?? '') : '') ? '' : 'selected' }}>-- Pilih Program Studi --</option>
                            
                            @foreach ($optprogdi as $key => $value)
                                <option value="{{ $key }}" class="bg-slate-800 text-white"
                                    {{-- Logic Selected yang Benar --}}
                                    {{ old('progdi', $is_update ? ($query->progdi ?? '') : '') == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                        
                        {{-- Custom Arrow Icon --}}
                        <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                {{-- Footer Action Buttons --}}
                <div class="pt-6 flex flex-col-reverse sm:flex-row items-center justify-end gap-3 sm:gap-4 border-t border-white/10 mt-8">
                    
                    <a href="{{ url('anggota') }}" 
                       class="w-full sm:w-auto px-6 py-3 rounded-lg text-slate-300 hover:text-white hover:bg-white/5 text-center font-medium transition-all duration-200">
                       Batal
                    </a>

                    <button type="submit" 
                            name="btn_simpan" 
                            value="Simpan"
                            class="w-full sm:w-auto px-8 py-3 rounded-lg bg-pink-600 hover:bg-pink-500 text-white font-bold shadow-lg shadow-pink-500/20 hover:shadow-pink-500/40 transform hover:-translate-y-0.5 transition-all duration-200">
                        {{ $is_update ? 'Simpan Perubahan' : 'Simpan Data Baru' }}
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection