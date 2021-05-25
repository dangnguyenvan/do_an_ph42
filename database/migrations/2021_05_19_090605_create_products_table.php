<?php

use App\Enums\ActiveStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('quantityInStore');
            $table->double('price');
            $table->string('ram');
            $table->string('rom');
            $table->string('battery_capacity');
            $table->string('front_camera');
            $table->string('rear_camera');
            $table->string('status')->default(ActiveStatus::ACTIVE);
            $table->unsignedBigInteger('category_id');
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
        Schema::dropIfExists('products');
    }
}
