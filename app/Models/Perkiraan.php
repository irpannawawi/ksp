<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perkiraan extends Model
{
    use HasFactory;
    protected $table = 'perkiraan';
    protected $primaryKey = 'kode_akun';
    public $timestamps = false;
    protected $fillable = [
        'kode_akun',
        'nama_akun',
        'jenis_akun',
    ];


}
