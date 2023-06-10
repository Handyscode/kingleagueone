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
        Schema::create('live_scores', function (Blueprint $table) {
            $table->char('id_livescore', 10)->primary();
            $table->char('id_pertandingan', 10);
            $table->integer('score_home');
            $table->integer('score_away');
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
        Schema::dropIfExists('live_scores');
    }
};
