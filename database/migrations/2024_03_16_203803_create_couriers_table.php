<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('endpoint');
            $table->string('country_code');
            $table->string('track_url')->nullable();
            $table->string('logo');
            $table->integer('box_weight_limit')->nullable();
            $table->integer('pallet_weight_limit')->nullable();
            $table->integer('pickup_sameday')->nullable();
            $table->integer('pickup_start_time')->nullable();
            $table->integer('pickup_end_time')->nullable();
            $table->integer('pickup_span_time')->nullable();
            $table->integer('pickup_sameday_limit_time')->nullable();        
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
        Schema::dropIfExists('couriers');
    }
}
