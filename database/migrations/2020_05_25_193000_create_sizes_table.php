<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sizes', function (Blueprint $table) {
          $table->id();
          $table->string('value');
          $table->integer('quantity')->unsigned();
          $table->bigInteger('product_id')->unsigned();
          $table->timestamps();
      });

      Schema::table('sizes', function($table){
          $table->foreign('product_id')->references('id')->on('products');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sizes');
    }
}
