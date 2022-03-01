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
        Schema::create('LoaiSanPham', function (Blueprint $table) {
            $table->id();
            $table->string('TenLoaiSanPham');
            $table->string('MoTa');
            $table->unsignedBigInteger('id_KhuyenMai');

            $table->foreignId('id_KhuyenMai')->references('id')->on('KhuyenMai');
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
        Schema::dropIfExists('loai_san_pham');
    }
};
