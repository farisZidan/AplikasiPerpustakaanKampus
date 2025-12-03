@extends('layouts.main')

@section('content')

{{-- Background Fixed --}}
<div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
     style="background-image: url('{{ asset('images/Library2.jpg') }}');">
</div>
<div class="fixed inset-0 -z-10 bg-slate-900/70 backdrop-blur-[3px]"></div>

<div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row justify-between items-end mb-12 border-b border-white/20 pb-6">
        <div class="text-center md:text-left">
            <h2 class="text-5xl font-bold tracking-tight font-serif text-white drop-shadow-lg">
                Koleksi Buku
            </h2>
            <p class="text-slate-300 mt-2 text-lg font-light tracking-wide font-sans">
                Jelajahi wawasan baru di perpustakaan digital kami.
            </p>
        </div>
        
        <a href="{{ url('/buku/add') }}" 
           class="mt-6 md:mt-0 bg-white text-primary hover:bg-indigo-50 font-bold py-3 px-8 rounded-full shadow-lg shadow-white/10 transition-all duration-300 transform hover:scale-105 flex items-center gap-2 group">
           <span>+ Tambah Buku</span>
           <span class="group-hover:translate-x-1 transition-transform duration-300">→</span>
        </a>
    </div>

    {{-- Grid Section --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-6 gap-y-10 pb-20">

        @foreach ($query as $row)
            {{-- KARTU GAYA GELAP (DARK GLASS) --}}
            <div class="group relative aspect-[2/3] flex flex-col justify-between p-5 rounded-r-xl rounded-l-sm 
                        bg-slate-900/60 backdrop-blur-md border border-white/10 shadow-2xl 
                        transition-all duration-500 hover:-translate-y-3 hover:shadow-slate-900/50 hover:bg-slate-900/80 hover:z-20">
                
                {{-- Spine / Jilid --}}
                <div class="absolute left-0 top-0 bottom-0 w-2 bg-black/30 rounded-l-sm border-r border-white/10"></div>
                <div class="absolute left-2 top-0 bottom-0 w-[1px] bg-white/20"></div>

                {{-- Konten Atas --}}
                <div class="pl-3">
                    <div class="flex justify-end mb-3">
                        <span class="text-[10px] font-bold tracking-widest uppercase text-slate-400 border border-white/10 px-2 py-0.5 rounded-sm bg-white/5 font-sans">
                            {{ $optkategori[$row['Kategori']] ?? $row['Kategori'] }}
                        </span>
                    </div>

                    <h3 class="text-xl font-serif font-bold text-white leading-tight mb-2 line-clamp-3 group-hover:text-indigo-300 transition-colors drop-shadow-sm">
                        {{ $row['Judul'] }}
                    </h3>
                    
                    <div class="w-8 h-1 bg-indigo-500 rounded-full mt-2 mb-4 group-hover:w-20 transition-all duration-500 shadow-[0_0_10px_theme('colors.indigo.500')]"></div>
                </div>

                {{-- Konten Bawah --}}
                <div class="pl-3 mt-auto">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wide mb-0.5 font-sans">Penulis</p>
                    <p class="text-sm font-medium text-slate-200 mb-4 line-clamp-1 font-sans">{{ $row['Pengarang'] }}</p>

                    <div class="flex items-center justify-between pt-3 border-t border-white/10 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-all duration-300">
                        <a href="{{ url('buku/edit/'.$row['ID_Buku']) }}" 
                           class="text-indigo-400 hover:text-indigo-300 text-xs font-bold uppercase tracking-wider hover:underline">
                           Edit
                        </a>
                        
                        <form action="{{ url('buku/delete/'.$row['ID_Buku']) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Hapus buku ini?')"
                                    class="text-rose-400 hover:text-rose-300 text-xs font-bold uppercase tracking-wider hover:underline">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    {{-- Pagination --}}
    <div class="flex flex-col items-center gap-4 sm:flex-row sm:justify-between mt-8 mb-6 p-4 rounded-full bg-slate-900/40 backdrop-blur-md border border-white/10">

        <div class="text-sm text-slate-300 pl-4">
            Showing {{ $query->firstItem() }}–{{ $query->lastItem() }}
            of {{ $query->total() }} results
        </div>

        <div class="inline-block">
            {{ $query->links('pagination::tailwind') }}
        </div>

    </div>

</div>
@endsection