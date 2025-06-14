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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('namaPelanggan');
            $table->string('notelp');
            $table->foreignId('perumahan_id')->constrained('perumahan')->onDelete('restrict')->onUpdate('restrict');
            $table->foreignId('karyawan_id')->constrained('karyawan')->onDelete('restrict')->onUpdate('restrict');
            $table->string('Harga');
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
        Schema::dropIfExists('transaksi');
    }
};
