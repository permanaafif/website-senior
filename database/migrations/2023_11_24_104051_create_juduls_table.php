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
        Schema::create('juduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosen_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mata_kuliah_id')->onUpdate('cascade')->onDelete('cascade');
            $table->text('nama_judul');
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
        Schema::dropIfExists('juduls');
    }
};
