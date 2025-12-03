<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam_m extends Model
{
    protected $table = 'pinjam';
    protected $primaryKey = 'ID_Pinjam';
    public $timestamps = false;

    protected $fillable = [
        'ID_Buku',
        'ID_Anggota',
        'tgl_pinjam',
        'tgl_kembali'
    ];

    public function buku() {
        return $this->belongsTo(Buku_m::class, 'ID_Buku', 'ID_Buku');
    }

    public function anggota() {
        return $this->belongsTo(Anggota_m::class, 'ID_Anggota', 'ID_Anggota');
    }

    public function insert_record($data) {
        $result = self::insert($data);
        return $result;
    }
}