<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('lahan_terpilih');
            $table->string('tarif');
            $table->string('jenis_pembayaran');
            $table->string('status_pembayaran');
            $table->string('waktu_booking');
           // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->unsignedBigInteger('parkir_id');
            // $table->foreign('parkir_id')->references('id')->on('parkirs')->onUpdate('cascade')->onDelete('cascade');
            $table->string( 'nomor_kendaraan');
            $table->string('kendaraan');
            $table->string('nama_pengguna');
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
        Schema::dropIfExists('bookings');
    }
}


