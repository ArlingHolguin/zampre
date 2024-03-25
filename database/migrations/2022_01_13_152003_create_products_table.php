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
            $table->string('referencia')->nullable();
            $table->string('slug')->unique();
            $table->integer('price');
            $table->integer('price_discount')->nullable()->default(0);
            $table->integer('price_discount_percent')->nullable()->default(0);
            $table->integer('quantity')->nullable();
            //campo boolean free shipping
            $table->boolean('free_shipping')->default(0);  
            $table->json('dimensions')->nullable();      
            // "dimensions": {
            //     "width": null,
            //     "height": null,
            //     "length": null,
            //     "weight": "1"
            //   },    
            //campo boolean
            $table->enum('status', [Product::BORRADOR, Product::PUBLICADO])->default(Product::BORRADOR);
            $table->string('keywords')->nullable();
            $table->longText('extracto')->nullable();

            //relacion con categorias
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            //relacion con subcategorias
            $table->unsignedBigInteger('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

            //relacion con brands
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');

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
