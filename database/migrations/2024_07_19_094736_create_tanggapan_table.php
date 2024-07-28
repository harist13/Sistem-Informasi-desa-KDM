<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanTable extends Migration
{
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id('id_tanggapan');
            $table->unsignedBigInteger('id_pengaduan');
            $table->date('tgl_tanggapan');
            $table->unsignedBigInteger('id_petugas');
            $table->timestamps();

            $table->foreign('id_pengaduan')->references('id_pengaduan')->on('pengaduan');
            $table->foreign('id_petugas')->references('id')->on('petugas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tanggapan');
    }
}