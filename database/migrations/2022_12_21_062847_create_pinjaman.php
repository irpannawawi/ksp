<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->increments('no_pinjaman')->primary;
            $table->string('no_nasabah', 35);
            $table->string('tgl_pengajuan', 20);
            $table->integer('besar_pinjaman');
            $table->float('bunga_pinjaman');
            $table->integer('total_pinjaman');
            $table->integer('lama_angsuran'); 
            $table->integer('jumlah_cicilan');
            $table->string('status_pencairan', 35); 
            $table->string('id_petugas', 35); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjaman');
    }
};
