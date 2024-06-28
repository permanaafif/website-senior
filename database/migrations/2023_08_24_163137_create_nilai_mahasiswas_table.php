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
        Schema::create('nilai_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id');
            $table->foreignId('nilai_bobot_id');
            $table->integer('sikap');
            $table->integer('tugas');
            $table->integer('kompetensi');
            $table->integer('bobot');
            $table->integer('nilai_akhir');
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
        Schema::dropIfExists('nilai_mahasiswas');
    }
};
