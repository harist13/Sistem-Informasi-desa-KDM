<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama', 100);
            $table->string('foto', 255);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->text('alamat');
            $table->string('rt_rw', 10);
            $table->string('kelurahan', 100);
            $table->string('kecamatan', 100);
            $table->string('kabupaten', 100);
            $table->string('provinsi', 100);
            $table->string('agama', 50);
            $table->enum('status_perkawinan', ['belum kawin', 'kawin', 'cerai hidup', 'cerai mati']);
            $table->string('pekerjaan', 100);
            $table->enum('status_penduduk', ['tetap', 'tidak tetap', 'meninggal']);
            $table->timestamps();

            // Foreign key to petugas (assuming petugas manages penduduk)
            $table->foreignId('petugas_id')->constrained('petugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
}
