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
        Schema::create('nilai_bobots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id');
            $table->foreignId('mata_kuliah_id');
            $table->integer('bobot_tugas');
            $table->integer('bobot_kuis');
            $table->integer('bobot_uts');
            $table->integer('bobot_uas');
            $table->integer('nilai_akhir')->nullable();
            $table->char('grade')->nullable();
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
        Schema::dropIfExists('nilai_bobots');
    }
};
