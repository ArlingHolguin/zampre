<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Orden;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('code_id');

             $table->string('contact');
             $table->string('phone');
             $table->enum('status', [Orden::PENDIENTE,Orden::RECIBIDO, Orden::ENVIADO, Orden::ENTREGADO, Orden::ANULADO])->default(Orden::PENDIENTE);
             $table->enum('envio_type', [1, 2]);
             $table->integer('shipping_cost');
             $table->integer('total');
             $table->json('content');

             $table->unsignedBigInteger('departamento_id')->nullable();
            $table->foreign('departamento_id')->references('id')->on('departamentos');

            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->foreign('municipio_id')->references('id')->on('municipios');
        

            $table->string('address')->nullable();
            $table->string('references')->nullable();
            $table->string('casa')->nullable();
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
        Schema::dropIfExists('ordens');
    }
}
