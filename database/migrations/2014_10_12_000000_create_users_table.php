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
        Schema::create('petugas', function (Blueprint $table) {
            $table->increments('id_petugas')->primary;
            $table->string('username', 35);
            $table->string('nama_petugas', 35);
            $table->string('alamat_petugas', 100);
            $table->string('no_tlp', 15)->nullable();
            $table->string('tempat_lahir', 35);
            $table->string('tanggal_lahir', 35);
            $table->string('password', 128);
            $table->enum('hak_akses', ['admin', 'kasir', 'pengawas']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
};
