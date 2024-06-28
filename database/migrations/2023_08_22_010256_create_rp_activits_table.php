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
        Schema::create('rp_activits', function (Blueprint $table) {
            $table->id();
            $table->string('minggu');
            $table->foreignId('sub_cpmk_id');
            $table->text('bk_pemb');
            $table->text('mt_pemb');
            $table->foreignId('wk_sk_id');
            $table->foreignId('rp_penilaian_id');
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
        Schema::dropIfExists('rp_activits');
    }
};
