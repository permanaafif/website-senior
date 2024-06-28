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
        Schema::create('kontents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('judul_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subjudul_id')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->text('isi_konten');
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
        Schema::dropIfExists('kontents');
    }
};
