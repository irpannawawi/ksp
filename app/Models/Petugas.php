<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Petugas extends Authenticable
{

    use HasFactory;
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps = false;
    protected $fillable = [
        'username',
        'nama_petugas',
        'alamat_petugas',
        'no_tlp',
        'tempat_lahir',
        'tanggal_lahir',
        'password',
        'hak_akses',
    ];

    protected $hidden = ['password'];
    public function username(){
        return 'nama_petugas';  
    }
}
