<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'no_transaksi';
    public $timestamps = false;
    protected $fillable = [
        'no_transaksi',
        'tanggal_transaksi',
        'no_nasabah',
        'besar_transaksi',
        'id_petugas',
    ];
    
    
    public function petugas()
    {
        return $this->hasOne(Petugas::class, 'id_petugas');
    }    
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'no_nasabah', 'no_nasabah');
    }
}
