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
        Schema::create('jurnal', function (Blueprint $table) {
            $table->increments('no_jurnal')->primary;
            $table->date('tgl_jurnal');
            $table->string('keterangan', 100);
            $table->string('no_reff', 35);
            $table->integer('debet');
            $table->integer('kredit');
            $table->string('id_petugas', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal');
    }
};
