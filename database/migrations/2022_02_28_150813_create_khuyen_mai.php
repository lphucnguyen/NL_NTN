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
        Schema::create('KhuyenMai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_LoaiSanPham');
            $table->integer('GiaTriKhuyenMai');
            $table->string('NoiDung');
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc');

            $table->foreignId('id_LoaiSanPham')->references('id')->on('LoaiSanPham');
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
        Schema::dropIfExists('khuyen_mai');
    }
};
