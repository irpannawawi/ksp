<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;
    protected $table = 'nasabah';
    protected $primaryKey = 'no_nasabah';
    public $timestamps = false;
    protected $fillable = [
        'no_nasabah',
        'tanggal_daftar',
        'nama_nasabah',
        'jenis_kelamin',
        'alamat_nasabah',
        'no_tlp',
        'status_nasabah',
        'saldo',
    ];
}
