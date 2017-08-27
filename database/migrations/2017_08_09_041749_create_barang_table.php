<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kdbarang',10)->unique();
            $table->string('namabrg');
            $table->integer('harga');
            $table->integer('hargabeli');
            $table->integer('jumlah');
        });

        Schema::create('transaksi', function (Blueprint $table) {
            $table->string('notrans',10)->primary();
            $table->timestamp('created_at')->nullable();
            $table->integer('total');
            $table->integer('profit');
        });

        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('notrans');
            $table->string('kdbarang');
            $table->string('namabrg');
            $table->integer('kuantitas');
            $table->integer('harga');
            $table->integer('profit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
