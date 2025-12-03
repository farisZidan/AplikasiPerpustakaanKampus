@extends('layouts.main')

@section('content')

{{-- Background --}}
<div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
     style="background-image: url('{{ asset('images/Library2.jpg') }}');">
</div>
<div class="fixed inset-0 -z-10 bg-slate-900/70 backdrop-blur-[3px]"></div>

<div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-white/20 pb-6">
        <div class="text-center md:text-left">
            <h2 class="text-4xl md:text-5xl font-bold tracking-tight font-serif text-white drop-shadow-lg">
                Data Anggota
            </h2>
            <p class="text-slate-300 mt-2 text-base md:text-lg font-light tracking-wide font-sans">
                Kelola informasi anggota perpustakaan dengan mudah dan rapi.
            </p>
        </div>

        <a href="{{ url('/anggota/add') }}" 
           class="mt-6 md:mt-0 bg-white text-primary hover:bg-indigo-50 font-bold py-3 px-8 rounded-full shadow-lg shadow-white/10 transition-all duration-300 transform hover:scale-105 flex items-center gap-2 group">
           <span>+ Tambah Anggota</span>
           <span class="group-hover:translate-x-1 transition-transform duration-300">→</span>
        </a>
    </div>

    {{-- Table wrapper --}}
    <div class="bg-slate-900/40 backdrop-blur-md border border-white/10 rounded-2xl shadow-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-white/10 flex justify-between items-center">
            <h3 class="text-sm font-semibold tracking-wide text-slate-200 uppercase">
                Daftar Anggota
            </h3>
            @if(session('error'))
                <div class="mb-3 px-4 py-2 bg-rose-600/20 border border-rose-500/40 text-rose-300 rounded">
                    {{ session('error') }}
                </div>
            @endif
            <span class="text-xs text-slate-400">
                Total: {{ $query->total() ?? count($query) }} anggota
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/10 text-sm">
                <thead class="bg-slate-900/60">
                    <tr>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">
                            No
                        </th>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">
                            NIM
                        </th>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">
                            Nama
                        </th>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">
                            Progdi
                        </th>
                        <th class="px-6 py-3 text-center text-[11px] font-semibold tracking-widest text-slate-300 uppercase">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 bg-slate-900/20">
                    @php $no = ($query->currentPage() - 1) * $query->perPage(); @endphp

                    @foreach ($query as $row)
                        @php $no++; @endphp
                        <tr class="hover:bg-slate-900/40 transition-colors">
                            <td class="px-6 py-3 whitespace-nowrap text-slate-100">
                                {{ $no }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap font-mono text-slate-100">
                                {{ $row['nim'] }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap text-slate-100">
                                {{ $row['nama'] }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap text-slate-200">
                                {{ $optprogdi[$row['progdi']] ?? $row['progdi'] }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap text-center">
                                <div class="flex gap-2 items-center justify-center">
                                    <a href="{{ url('anggota/edit/'.$row['ID_Anggota']) }}"
                                       class="text-indigo-400 hover:text-indigo-300 font-medium text-xs uppercase tracking-wide hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ url('anggota/delete/'.$row['ID_Anggota']) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Hapus anggota ini?')"
                                            class="text-rose-400 hover:text-rose-300 font-medium text-xs uppercase tracking-wide hover:underline">
                                        Hapus
                                    </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    @if ($query->isEmpty())
                        <tr>
                            <td colspan="5" class="px-6 py-6 text-center text-slate-400 text-sm">
                                Belum ada data anggota.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination anggota --}}
        @if(method_exists($query, 'links'))
            <div class="px-6 py-4 flex flex-col items-center gap-4 sm:flex-row sm:justify-between">
                <div class="text-xs text-slate-400">
                    Showing {{ $query->firstItem() }}–{{ $query->lastItem() }}
                    of {{ $query->total() }} anggota
                </div>

                <div class="inline-block">
                    {{ $query->links('pagination::tailwind') }}
                </div>
            </div>
        @endif
    </div>

</div>

@endsection
