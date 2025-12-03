@extends('layouts.main')

@section('content')

{{-- Background Fixed --}}
<div class="fixed inset-0 -z-10 bg-cover bg-center bg-no-repeat"
     style="background-image: url('{{ asset('images/Library2.jpg') }}');">
</div>
<div class="fixed inset-0 -z-10 bg-slate-900/70 backdrop-blur-[3px]"></div>

<div class="relative w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-white/20 pb-6">
        <div class="text-center md:text-left">
            <h2 class="text-4xl md:text-5xl font-bold tracking-tight font-serif text-white drop-shadow-lg">
                Transaksi Peminjaman
            </h2>
            <p class="text-slate-300 mt-2 text-base md:text-lg font-light tracking-wide font-sans">
                Pantau sirkulasi peminjaman buku perpustakaan secara real-time.
            </p>
        </div>

        <a href="{{ url('/pinjam/create') }}" 
           class="mt-6 md:mt-0 bg-white text-primary hover:bg-indigo-50 font-bold py-3 px-8 rounded-full shadow-lg shadow-white/10 transition-all duration-300 transform hover:scale-105 flex items-center gap-2 group">
           <span>+ Transaksi Baru</span>
           <span class="group-hover:translate-x-1 transition-transform duration-300">→</span>
        </a>
    </div>

    {{-- Table Wrapper --}}
    <div class="bg-slate-900/40 backdrop-blur-md border border-white/10 rounded-2xl shadow-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-white/10 flex justify-between items-center">
            <h3 class="text-sm font-semibold tracking-wide text-slate-200 uppercase">
                Riwayat Peminjaman
            </h3>
            <span class="text-xs text-slate-400">
                Total: {{ $query->total() ?? count($query) }} transaksi
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-white/10 text-sm">
                {{-- Table Head --}}
                <thead class="bg-slate-900/60">
                    <tr>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">Nama Peminjam</th>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">Judul Buku</th>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">Tgl Pinjam</th>
                        <th class="px-6 py-3 text-left text-[11px] font-semibold tracking-widest text-slate-300 uppercase">Tgl Kembali</th>
                        <th class="px-6 py-3 text-center text-[11px] font-semibold tracking-widest text-slate-300 uppercase">Status</th>
                        <th class="px-6 py-3 text-center text-[11px] font-semibold tracking-widest text-slate-300 uppercase">Aksi</th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="divide-y divide-white/5 bg-slate-900/20 text-slate-100">
                    @php $no = ($query->currentPage() - 1) * $query->perPage(); @endphp

                    @foreach ($query as $row)
                        @php 
                            $no++;
                            $tglKembali = strtotime($row->tgl_kembali);
                            $tglDikembalikan = $row->tgl_dikembalikan ? strtotime($row->tgl_dikembalikan) : null;
                            $sekarang = time();
                        @endphp

                        <tr class="hover:bg-slate-900/40 transition-colors">

                            {{-- No --}}
                            <td class="px-6 py-4 whitespace-nowrap text-slate-400 font-mono">
                                {{ $no }}
                            </td>

                            {{-- Nama Anggota --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-bold text-white">
                                    {{ $row->anggota->nama ?? 'Anggota Terhapus' }}
                                </div>
                                <div class="text-xs text-slate-400 font-mono mt-0.5">
                                    {{ $row->anggota->nim ?? '-' }}
                                </div>
                            </td>

                            {{-- Judul Buku --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="font-medium text-indigo-300">
                                    {{ $row->buku->Judul ?? 'Buku Terhapus' }}
                                </span>
                            </td>

                            {{-- Tanggal --}}
                            <td class="px-6 py-4 whitespace-nowrap text-slate-300 font-sans">
                                {{ date('d M Y', strtotime($row->tgl_pinjam)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-300 font-sans">
                                {{ date('d M Y', strtotime($row->tgl_kembali)) }}
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if($tglDikembalikan)
                                    {{-- SUDAH KEMBALI --}}
                                    <div class="flex flex-col items-center gap-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wide
                                                    bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 shadow-sm shadow-emerald-500/10">
                                            Kembali
                                        </span>
                                        <span class="text-[11px] text-slate-400 font-mono">
                                            {{ date('d M Y', $tglDikembalikan) }}
                                        </span>
                                    </div>
                                @elseif ($tglKembali < $sekarang)
                                    {{-- TERLAMBAT --}}
                                    <div class="flex flex-col items-center gap-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wide
                                                    bg-rose-500/10 text-rose-400 border border-rose-500/20 shadow-sm shadow-rose-500/10">
                                            Terlambat
                                        </span>
                                        <span class="text-[11px] text-rose-300/80 font-mono">
                                            Jatuh tempo: {{ date('d M Y', $tglKembali) }}
                                        </span>
                                    </div>
                                @else
                                    {{-- MASIH AKTIF --}}
                                    <div class="flex flex-col items-center gap-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wide
                                                    bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 shadow-sm shadow-indigo-500/10">
                                            Aktif
                                        </span>
                                        <span class="text-[11px] text-slate-400 font-mono">
                                            Jatuh tempo: {{ date('d M Y', $tglKembali) }}
                                        </span>
                                    </div>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                @if(!$row->tgl_dikembalikan)
                                    <a href="{{ url('pinjam/return/' . $row->ID_Pinjam) }}"
                                       class="px-3 py-1 rounded-md text-xs bg-green-600 text-white hover:bg-green-700
                                              shadow shadow-green-700/20 transition">
                                        Kembalikan
                                    </a>
                                @else
                                    <div class="inline-flex flex-col items-center gap-1">
                                        <span class="text-xs text-slate-300">
                                            Sudah dikembalikan
                                        </span>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    {{-- Jika kosong --}}
                    @if($query->isEmpty())
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                                <p class="text-lg font-light">Belum ada data transaksi.</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if(method_exists($query, 'links'))
            <div class="px-6 py-4 border-t border-white/10 bg-slate-900/30 flex flex-col items-center gap-4 sm:flex-row sm:justify-between">
                <div class="text-xs text-slate-400">
                    Showing {{ $query->firstItem() }}–{{ $query->lastItem() }}
                    of {{ $query->total() }} results
                </div>

                <div class="inline-block">
                    {{ $query->links('pagination::tailwind') }}
                </div>
            </div>
        @endif
    </div>

</div>
@endsection
