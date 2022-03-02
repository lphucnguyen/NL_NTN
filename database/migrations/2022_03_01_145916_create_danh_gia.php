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
        Schema::create('DanhGia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_TaiKhoan');
            $table->unsignedBigInteger('id_SanPham');
            $table->string('NoiDung');
            $table->integer('SoSao');
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
        Schema::dropIfExists('danh_gia');
    }
};
