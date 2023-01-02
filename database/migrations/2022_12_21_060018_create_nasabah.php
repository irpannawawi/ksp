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
        Schema::create('nasabah', function (Blueprint $table) {
            $table->string('no_nasabah', 20)->primary;
            $table->string('tanggal_daftar', 35);
            $table->string('nama_nasabah', 100);
            $table->string('jenis_kelamin', 15);
            $table->string('alamat_nasabah', 155);
            $table->string('no_tlp', 35);
            $table->string('status_nasabah', 35); //???
            $table->integer('saldo'); //???
            $table->primary('no_nasabah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nasabah');
    }
};
