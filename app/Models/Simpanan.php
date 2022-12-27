<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;
    protected $table = 'simpanan';
    protected $primaryKey = 'no_simpanan';
    public $timestamps = false;
    protected $fillable = [
        'no_simpanan',
        'tanggal_simpanan',
        'no_nasabah',
        'besar_simpanan',
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
