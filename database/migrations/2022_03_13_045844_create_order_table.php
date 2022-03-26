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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');//người đặt hàng
            $table->unsignedBigInteger('admin_id');//Người duyệt đơn hàng
            $table->unsignedBigInteger('promotion_id');//Khuyến mãi (Nếu có)
            $table->string('payment_method');//Phương thức thành toán
            $table->double('total');//Tổng giá trị đơn hàng
            $table->string('status');//Trạng thái đơn hàng
            $table->date('delivery_date')->nullable();//Ngày giao hàng
            $table->date('receiving_date')->nullable();//Ngày nhận hàng
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
        Schema::dropIfExists('order');
    }
};
