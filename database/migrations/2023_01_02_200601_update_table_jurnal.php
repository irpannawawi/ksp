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
        Schema::table('jurnal', function (Blueprint $table) {
            $table->string('id_simpanan', 11)->default(null)->nullable();
            $table->string('id_transaksi', 11)->default(null)->nullable();
            $table->string('id_pencairan',11)->default(null)->nullable();
            $table->string('id_angsuran', 11)->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
