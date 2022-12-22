<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
            'username'      => 'admin',
            'nama_petugas'      => 'admin',
            'alamat_petugas'    => '-',
            'no_tlp'            => '-',
            'tempat_lahir'      => '-',
            'tanggal_lahir'     => '-',
            'password'          => Hash::make('admin'),
            'hak_akses'         => 'admin',
        ]);
    }
}
