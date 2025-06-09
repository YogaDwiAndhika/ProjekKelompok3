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
        Schema::create('tahapan', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi_tahapan');
            $table->string('volume')->nullable();
            $table->foreignId('bahan_id')->constrained('bahan')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('pekerjaan_id')->constrained('pekerjaan')->onDelete('restrict')->onUpdate('restrict');
            $table->string('status')->default('belum selesai');
            $table->string('TotalUpah')->nullable();
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('tahapan');
    }
};
