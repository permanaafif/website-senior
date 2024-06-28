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
        Schema::create('metodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('target_id')->onUpdate('cascade')->onDelete('cascade');
            $table->string('bentuk_metode');
            $table->string('kondisi_metode');
            $table->string('pengalaman_metode');
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
        Schema::dropIfExists('metodes');
    }
};
