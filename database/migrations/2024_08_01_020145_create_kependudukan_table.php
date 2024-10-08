<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKependudukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kependudukan', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('nama', 100);
            $table->string('nama_rt', 50);
            $table->string('no_kk', 100);
            $table->string('foto', 255)->nullable();
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('umur', 100);
            $table->string('jenis_kelamin', 50);
            $table->text('alamat');
            $table->string('rt_rw', 10);
            $table->string('dusun', 50);
            $table->string('kelurahan', 100);
            $table->string('kecamatan', 100);
            $table->string('kabupaten', 100);
            $table->string('provinsi', 100);
            $table->string('agama', 50);
            $table->string('status_perkawinan', 100);
            $table->string('pekerjaan', 100);
            $table->string('pendidikan', 100);
            $table->string('kewarganegaraan', 100);
            $table->string('status_penduduk', 100);
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
        Schema::dropIfExists('kependudukan');
    }
}

