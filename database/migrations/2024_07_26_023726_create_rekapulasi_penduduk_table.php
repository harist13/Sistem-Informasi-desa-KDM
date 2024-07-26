<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapulasiPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekapulasi_penduduk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petugas_id');
            $table->string('RT', 10);
            $table->integer('KK');
            $table->integer('LAKI_LAKI');
            $table->integer('PEREMPUAN');
            $table->integer('BH');
            $table->integer('BS');
            $table->integer('TK');
            $table->integer('SD');
            $table->integer('SLTP');
            $table->integer('SLTA');
            $table->integer('PT');
            $table->integer('TANI');
            $table->integer('DAGANG');
            $table->integer('PNS');
            $table->integer('TNI');
            $table->integer('SWASTA');
            $table->integer('ISLAM');
            $table->integer('KHALOTIK');
            $table->integer('PROTESTAN');
            $table->integer('WNI');
            $table->integer('WNA');
            $table->integer('LK1');
            $table->integer('PR1');
            $table->integer('LK2');
            $table->integer('PR2');
            $table->integer('LK3');
            $table->integer('PR3');
            $table->integer('LK4');
            $table->integer('PR4');
            $table->integer('KK2');
            $table->integer('LK5');
            $table->integer('PR5');
            $table->text('KETERANGAN')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('petugas_id')->references('id')->on('petugas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekapulasi_penduduk');
    }
}
