<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;
    protected $table = 'angsuran';
    protected $primaryKey = 'no_angsuran';
    public $timestamps = false;
    protected $fillable = [
        'no_angsuran',
        'no_pencairan',
        'tanggal_pembayaran',
        'angsuran_ke',
        'besar_pembayaran',
        'biaya_jasa',
        'denda',
        'id_petugas',
    ];
}
