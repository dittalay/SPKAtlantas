<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiKriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_kriteria', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_kriteria_1');
            $table->Integer('id_kriteria_2');
            $table->double('nilai')->nullable( );
            $table->timestamps();

            //$table->foreign('id_kriteria_1')->references('id')->on('kriteria_ahp');
            //$table->foreign('id_kriteria_2')->references('id')->on('kriteria_ahp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_kriteria');
    }
}
