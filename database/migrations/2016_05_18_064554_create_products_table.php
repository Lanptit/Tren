<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('prodId')->primary();
            $table->string('prodName');
            $table->string('prodPrice');
            $table->string('prodImageUrl');
            $table->string('prodDetailUrl');
            $table->string('catalogUrl');
            $table->string('tagWhat');
            $table->string('tagForWhom');
            $table->string('tagBrand');
            $table->string('tagSupplier');
            $table->string('tagPromotion');
            $table->string('tagArrival');
            $table->string('tagNavbar');
            $table->string('tagNavbarUrl');
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
        Schema::drop('products');
    }
}
