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
        Schema::create('detailproyek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_id')->constrained('proyek')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('bahan_id')->constrained('bahan')->onDelete('restrict')->onUpdate('restrict');
            $table->string('volume');
            $table->foreignId('pekerjaan_id')->constrained('pekerjaan')->onDelete('restrict')->onUpdate('restrict');
            $table->string('TotalBiaya');
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
        Schema::dropIfExists('detailproyek');
    }
};
