<?php

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vendorId');
            $table->string('product_name')->nullable();
            $table->string('productSlug')->nullable();
            $table->string('product_pic')->nullable();
            $table->float('product_price')->nullable();
            $table->text('product_desc')->nullable();
            $table->text('product_full_desc')->nullable();
            $table->string('product_type')->nullable();
            $table->text('ads_url')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('vendorId')->references('id')->on('vendors')->onDelete('cascade');
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
