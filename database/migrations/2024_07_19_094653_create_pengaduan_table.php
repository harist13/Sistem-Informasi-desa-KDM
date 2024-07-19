<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanTable extends Migration
{
    public function up()
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->date('tgl_pengaduan');
            $table->string('nik', 16);
            $table->text('isi_laporan');
            $table->string('foto', 255);
            $table->enum('status', ['0', 'proses', 'selesai']);
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakat');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengaduan');
    }
}