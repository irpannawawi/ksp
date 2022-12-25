<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjaman';
    protected $primaryKey = 'no_pinjaman';
    public $timestamps = false;
    protected $fillable = [
        'no_pinjaman',
        'no_nasabah',
        'tgl_pengajuan',
        'besar_pinjaman',
        'bunga_pinjaman',
        'total_pinjaman',
        'lama_angsuran',
        'jumlah_cicilan',
        'status_penciran',
        'id_petugas',
    ];

    public function nasabah(){
        return $this->belongsTo(Nasabah::class, 'no_nasabah');
    }

    public function pencairan()
    {
        return $this->hasOne(Pencairan::class, 'no_pinjaman');
    }

    public function petugas(){
        return $this->hasOne(Petugas::class, 'id_petugas');
    }
   
}
