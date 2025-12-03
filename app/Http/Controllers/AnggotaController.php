<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota_m;
use App\Models\Pinjam_m;

class AnggotaController extends Controller
{
    var $data;

    public function __construct() {
        $this->data['opt_progdi'] = [
            '' => '-Pilih salah satu-',
            'TI' => 'Teknik Informatika',
            'SI' => 'Sistem Informasi',
            'IK' => 'Ilmu Komunikasi'
        ];
    }

    public function index(Anggota_m $anggota) {
        $data = [
            'title' => 'Data Anggota',
            'query' => $anggota->paginate(15),
            'optprogdi' => $this->data['opt_progdi']
        ];
        return view('anggota.list', $data);
    }

    public function add_new() {
        $data = [
            'is_update' => 0,
            'optprogdi' => $this->data['opt_progdi']
        ];
        return view('anggota.add', $data);
    }

    public function save(Anggota_m $anggota, Request $request) {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'progdi' => 'required'
        ]);

        $data['nim'] = $request->input('nim');
        $data['nama'] = $request->input('nama');
        $data['progdi'] = $request->input('progdi');
        $is_update = $request->input('is_update');

        if($is_update == 0) {
            $anggota->insert_record($data);
        } else {
            $id = $request->input('id');
            $anggota->update_by_id($data, $id);
        }
        
        return redirect('anggota');
    }
    
    public function edit($id, Anggota_m $anggota) {
        $data = [
            'query' => $anggota->get_record($id)->first(),
            'is_update' => 1,
            'optprogdi' => $this->data['opt_progdi']
        ];
        return view('anggota.edit', $data);
    }

    
    public function delete($id, Anggota_m $anggota)
    {
        $masihDipinjam = Pinjam_m::where('ID_Anggota', $id)
                            ->whereNull('tgl_dikembalikan')
                            ->exists();

        if ($masihDipinjam) {
            return redirect('anggota')
                ->with('error', 'Anggota tidak dapat dihapus karena masih memiliki peminjaman yang belum dikembalikan.');
        }

        Pinjam_m::where('ID_Anggota', $id)->delete();

        $anggota->delete_by_id($id);

        return redirect('anggota')
            ->with('success', 'Anggota berhasil dihapus.');
    }   
}