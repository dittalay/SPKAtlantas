<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelAlternatif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi_pelanggaran');
            $table->date('tanggal');
            $table->varchar('longitude')->nullable;
            $table->varchar('latitude')->nullable;
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
        Schema::dropIfExists('tabel_alternatif');
    }
}
