<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkorNormalisasiKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skor_normalisasi_kriteria', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_kriteria');
            $table->double('skor');
            $table->double('persen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skor_normalisasi_kriteria');
    }
}
