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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->char('id_peserta', 6)->primary();
            $table->string('id_tim', 10);
            $table->string('photo', 255);
            $table->string('nama', 50);
            $table->string('asal_tim', 50);
            $table->string('kategori_usia', 10);
            $table->string('no_punggung', 50);
            $table->string('id_posisi', 10);
            $table->string('foto_kk', 255);
            $table->string('foto_akte', 255);
            $table->string('foto_ijazah', 255);
            $table->date('tgl_daftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesertas');
    }
};
