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

        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tarnsaksi', 100)->nullable();
            $table->integer('id_pembeli');
            $table->integer('id_penjual');
            $table->integer('id_barang');
            $table->integer('jumlah_barang');
            $table->integer('total_barang');
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
        Schema::dropIfExists('transaksis');
    }
};
