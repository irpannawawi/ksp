<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    use HasFactory;
    protected $table = 'pencairan';
    protected $primaryKey = 'no_pencairan';
    public $timestamps = false;
    protected $fillable = [
        'no_pencairan',
        'no_pinjaman',
        'tanggal_pencairan',
        'besar_penciran',
        'biaya_adm',
        'id_petugas',
    ];

    public function pinjaman(){
        return $this->hasOne(Pinjaman::class, 'no_pinjaman');
    }

    public function angsuran(){
        return $this->hasMany(Angsuran::class, 'no_pencairan');
    }

    public function petugas(){
        return $this->hasOne(Petugas::class, 'id_petugas');
    }
}
