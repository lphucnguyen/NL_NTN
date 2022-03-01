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
        Schema::create('DonHang', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('id_TaiKhoan');
            $table->unsignedBigInteger('id_HoaDon');

            $table->foreignId('id_TaiKhoan')->references('id')->on('TaiKhoan');
            $table->foreignId('id_HoaDon')->references('id')->on('HoaDon');
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
        Schema::dropIfExists('don_hang');
    }
};
