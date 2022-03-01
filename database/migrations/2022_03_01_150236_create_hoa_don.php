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
        Schema::create('HoaDon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_DonHang');
            $table->double('TongTien')->default(0);
            $table->string('PhuongThucThanhToan');

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
        Schema::dropIfExists('hoa_don');
    }
};
