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
        Schema::create('KhuyenMai', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('id_LoaiSanPham');
            $table->string('MaKH');
            
            $table->integer('GiaTriKhuyenMai');//10-20-99-50 (%)
            $table->string('NoiDung');
            $table->date('NgayBatDau');
            $table->date('NgayKetThuc');
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
        Schema::dropIfExists('KhuyenMai');
    }
};
