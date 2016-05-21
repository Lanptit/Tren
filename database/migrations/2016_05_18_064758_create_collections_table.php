<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->string('collectId')->primary();
            $table->string('collectName');
            $table->string('collectImage');
            $table->string('collectType');
            $table->string('ownerId');
            $table->string('ownerType');
            $table->string('brandName')->nullable();
            $table->string('brandLogo')->nullable();
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
        Schema::drop('collections');
    }
}
