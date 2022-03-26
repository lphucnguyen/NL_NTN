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
        //user - role
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role')
                ->references('id')->on('user_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //Product Imgae - Product
        Schema::table('product_images', function (Blueprint $table) {
            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //Product - Product Type
        Schema::table('product', function (Blueprint $table) {
            $table->foreign('type')
                ->references('id')->on('product_type')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //Order - Users (Order - Client/Admin) - Promotion
        Schema::table('order', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('admin_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('promotion_id')
                ->references('id')->on('promotion')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //Order detail - Product - Order
        Schema::table('order_detail', function (Blueprint $table) {
            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('order_id')
                ->references('id')->on('order')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //Guarantee - Order Detail
        Schema::table('guarantee', function (Blueprint $table) {
            $table->foreign('order_detail_id')
                ->references('id')->on('order_detail')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //Evaluate - User - Product
        Schema::table('evaluate', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('product_id')
                ->references('id')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        //Staff History - Users
        Schema::table('staff_history', function (Blueprint $table) {
            $table->foreign('staff_id')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
