<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam_m;
use App\Models\Buku_m;
use App\Models\Anggota_m;

class PinjamController extends Controller
{
    public function index(Pinjam_m $pinjam)
    {
        $data = [
            'query' => Pinjam_m::with(['buku', 'anggota'])
                        ->orderBy('tgl_pinjam', 'desc')
                        ->paginate(15),
            'title' => 'Data Peminjaman'
        ];

        return view('pinjam.list', $data);
    }

    public function create(Buku_m $buku, Anggota_m $anggota)
    {
        $data = [
            'query' => [
                'buku' => $buku->get_record(),
                'anggota' => $anggota->get_record()
            ]
        ];

        return view('pinjam.add', $data);
    }

    public function save(Pinjam_m $pinjam, Request $request)
    {
        $validated = $request->validate([
            'anggota_id'   => 'required',
            'buku_id'      => 'required',
            'tgl_pinjam'   => 'required|date',
            'tgl_kembali'  => 'required|date'
        ]);

        $sedangDipinjam = Pinjam_m::where('ID_Buku', $request->buku_id)
                            ->whereNull('tgl_dikembalikan')
                            ->exists();

        if ($sedangDipinjam) {
            return back()->with('error', 'Buku ini sedang dipinjam dan belum dikembalikan.')->withInput();
        }

        $data = [
            'ID_Buku'       => $request->buku_id,
            'ID_Anggota'    => $request->anggota_id,
            'tgl_pinjam'    => $request->tgl_pinjam,
            'tgl_kembali'   => $request->tgl_kembali,
            'tgl_dikembalikan' => null,
            'status'        => 'pinjam'
        ];

        $pinjam->insert_record($data);

        return redirect('pinjam')->with('success', 'Transaksi peminjaman berhasil ditambahkan.');
    }

    public function return_book($id)
    {
        $pinjam = Pinjam_m::findOrFail($id);
        $pinjam->tgl_dikembalikan = now();

        // Tentukan status baru
        if (now()->gt($pinjam->tgl_kembali)) {
            $pinjam->status = 'terlambat';
        } else {
            $pinjam->status = 'kembali';
        }

        $pinjam->save();

        return redirect('/pinjam')->with('success', 'Buku berhasil dikembalikan.');
    }
}
