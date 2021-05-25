<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('products', 'category_id') && Schema::hasTable('categories')) {
            Schema::table('products', function (Blueprint $table) {
                $table->foreign('category_id')->references('id')->on('categories');
            });
        }
        if (Schema::hasColumn('images', 'product_id') && Schema::hasTable('products')) {
            Schema::table('images', function (Blueprint $table) {
                $table->foreign('product_id')->references('id')->on('products');
            });
        }
        if (Schema::hasColumn('colors', 'product_id') && Schema::hasTable('products')) {
            Schema::table('colors', function (Blueprint $table) {
                $table->foreign('product_id')->references('id')->on('products');
            });
        }
        if (Schema::hasColumn('product_promotion', 'product_id') && Schema::hasTable('products')) {
            Schema::table('product_promotion', function (Blueprint $table) {
                $table->foreign('product_id')->references('id')->on('products');
            });
        }
        if (Schema::hasColumn('product_promotion', 'promotion_id') && Schema::hasTable('promotions')) {
            Schema::table('product_promotion', function (Blueprint $table) {
                $table->foreign('promotion_id')->references('id')->on('promotions');
            });
        }
        if (Schema::hasColumn('comments', 'product_id') && Schema::hasTable('products')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->foreign('product_id')->references('id')->on('products');
            });
        }
        if (Schema::hasColumn('comments', 'user_id') && Schema::hasTable('users')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
        if (Schema::hasColumn('user_role', 'user_id') && Schema::hasTable('users')) {
            Schema::table('user_role', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
        if (Schema::hasColumn('user_role', 'role_id') && Schema::hasTable('roles')) {
            Schema::table('user_role', function (Blueprint $table) {
                $table->foreign('role_id')->references('id')->on('roles');
            });
        }
        if (Schema::hasColumn('order_details', 'product_id') && Schema::hasTable('products')) {
            Schema::table('order_details', function (Blueprint $table) {
                $table->foreign('product_id')->references('id')->on('products');
            });
        }
        if (Schema::hasColumn('order_details', 'color_id') && Schema::hasTable('colors')) {
            Schema::table('order_details', function (Blueprint $table) {
                $table->foreign('color_id')->references('id')->on('colors');
            });
        }
        if (Schema::hasColumn('order_details', 'promotion_id') && Schema::hasTable('promotions')) {
            Schema::table('order_details', function (Blueprint $table) {
                $table->foreign('promotion_id')->references('id')->on('promotions');
            });
        }
        if (Schema::hasColumn('order_details', 'order_id') && Schema::hasTable('orders')) {
            Schema::table('order_details', function (Blueprint $table) {
                $table->foreign('order_id')->references('id')->on('orders');
            });
        }
        if (Schema::hasColumn('orders', 'user_id') && Schema::hasTable('users')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
        if (Schema::hasColumn('orders', 'shipping_id') && Schema::hasTable('shipping_address')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->foreign('shipping_id')->references('id')->on('shipping_address');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SetForeignKey');
    }
}
