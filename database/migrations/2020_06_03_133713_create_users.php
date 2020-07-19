<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pangkat');
            $table->integer('email')->unique();
            $table->string('nama_anggota');
            $table->string('gender');
            $table->string('jabatan');
            $table->string('kesatuan');
            $table->date('tanggal_dikeluarkan');
            $table->string('tempat_dikeluarkan');
            $table->date('berlaku_sampai');
            $table->string('password');
            $table->string('role');
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
