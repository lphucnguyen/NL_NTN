<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_TaiKhoan');//Nhan vien
            $table->unsignedBigInteger('id_TaiKhoanKhachHang');// Khach hang
            $table->string('PhuongThucThanhToan');//Tiền mặt, Momo, QR,...
            $table->double('TongTien')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DonHang');
    }
};
