<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191)->unique();
            $table->string('category_name', 191)->nullable();
            $table->double('price', 8, 2);
            $table->text('description')->nullable();
            $table->foreign('category_name')->references('name')->on('category')->nullable()->onDelete('set null')->onUpdate('cascade');
            $table->string('image', 255)->default('default.jpg');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
