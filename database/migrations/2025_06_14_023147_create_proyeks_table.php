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
        Schema::create('proyek', function (Blueprint $table) {
            $table->id();
            $table->string('NamaProyek');
            $table->foreignId('perumahan_id')->constrained('perumahan')->onDelete('restrict')->onUpdate('restrict');
            $table->date('TanggalMulai');
            $table->date('TanggalSelesai');
            $table->string('EstimasiBiaya');
            $table->string('status')->default('belum selesai');
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
        Schema::dropIfExists('proyek');
    }
};
