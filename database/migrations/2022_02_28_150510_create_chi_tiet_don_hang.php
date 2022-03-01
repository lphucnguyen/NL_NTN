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
        Schema::create('ChiTietDonHang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_SanPham');
            $table->unsignedBigInteger('id_DonHang');

            $table->foreignId('id_SanPham')->references('id')->on('SanPham');
            $table->foreignId('id_DonHang')->references('id')->on('DonHang');
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
        Schema::dropIfExists('chi_tiet_don_hang');
    }
};
