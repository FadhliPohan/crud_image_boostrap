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

        Schema::create('penjuals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penjual', 300);
            $table->string('alamat_penjual', 300);
            $table->string('foto_penjual', 300);
            $table->string('NIK', 300);
            $table->string('jk_penjual', 300);
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
        Schema::dropIfExists('penjuals');
    }
};
