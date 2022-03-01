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
        Schema::create('SanPham', function (Blueprint $table) {
            $table->id();
            $table->string('TenSanPham');
            $table->unsignedBigInteger('id_LoaiSanPham');
            $table->string('MoTa');
            $table->double('Gia');
            $table->integer('SoLuong');

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
        Schema::dropIfExists('san_pham');
    }
};
