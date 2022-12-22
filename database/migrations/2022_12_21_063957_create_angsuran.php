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
        Schema::create('angsuran', function (Blueprint $table) {
            $table->increments('no_angsuran')->primary;
            $table->string('no_pencairan', 35);
            $table->string('tanggal_pembayaran', 20);
            $table->integer('angsuran_ke');
            $table->integer('besar_pembayaran');
            $table->integer('biaya_jasa');
            $table->integer('denda');
            $table->integer('id_petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('angsuran');
    }
};
