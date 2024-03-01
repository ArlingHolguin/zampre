<?php

use App\Models\Product;
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
            //campo slug unico 
            $table->longText('description');
            $table->string('referencia');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->integer('quantity')->nullable();
            //medidas
            $table->string('cabeza')->nullable();
            $table->string('rosca')->nullable();
            $table->string('estria')->nullable();
            $table->string('largo')->nullable();
            $table->string('alto')->nullable();
            $table->string('hex')->nullable();
            //campo boolean
            $table->boolean('status')->default(false)->nullable();
            $table->string('keywords')->nullable();
            $table->longText('extracto')->nullable();

            //relacion con categorias
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            //relacion con brands
            // $table->unsignedBigInteger('brand_id');
            // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

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
