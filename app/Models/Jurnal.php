<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $table = 'jurnal';
    protected $primaryKey = 'no_jurnal';
    public $timestamps = false;
    protected $fillable = [
        'no_jurnal',
        'tgl_jurnal',
        'keterangan',
        'no_reff',
        'debet',
        'kredit',
        'id_petugas',
    ];

    public function petugas(){
        return $this->hasOne(Petugas::class, 'id_petugas');
    }
}
