<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatapeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapeminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kodebarang',10);
            $table->string('nim',10);
            $table->bigInteger('iduser')->unsigned();
            $table->datetime('tglpinjam');
            $table->datetime('tglkembali')->nullable();

            $table->foreign('kodebarang')->references('kode')->on('barang')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('peminjam')->onDelete('cascade');
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datapeminjaman');
    }
}
