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
        Schema::create('rps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mata_kuliah_id');
            $table->foreignId('sks');
            $table->foreignId('otorisasi_id');
            $table->foreignId('cpl_prodi_id');
            $table->text('desc_matkul');
            $table->text('desc_bk');
            $table->foreignId('pustaka_id');
            $table->foreignId('team_id');
            $table->date('tgl_penyusunan');
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
        Schema::dropIfExists('rps');
    }
};
