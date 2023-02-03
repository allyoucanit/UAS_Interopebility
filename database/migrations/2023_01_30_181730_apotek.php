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
        Schema::create('apotek', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_obat', 11);
            $table->string('nama_obat', 50);
            $table->string('harga_beli', 50);
            $table->string('harga_jual', 50);
            $table->string('stock', 50);
            $table->string('satuan', 50);

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
        Schema::dropIfExists('apotek');
    }
};
