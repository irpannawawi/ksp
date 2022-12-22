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
        Schema::create('pencairan', function (Blueprint $table) {
            $table->increments('no_pencairan')->primary;
            $table->string('no_pinjaman', 35);
            $table->string('tanggal_pencairan', 20);
            $table->integer('besar_pencairan');
            $table->integer('biaya_adm');
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
        Schema::dropIfExists('pencairan');
    }
};
