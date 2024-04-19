<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddComboTypeToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            //is_combo , combo_properties agergar estos campos a la tabla products despues de name
            // Verificar si la columna ya existe antes de intentar agregarla
        if (!Schema::hasColumn('products', 'is_combo')) {
            $table->boolean('is_combo')->default(false);
        }

        // Similar para 'combo_properties'
        if (!Schema::hasColumn('products', 'combo_properties')) {
            $table->json('combo_properties')->nullable();
        }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
            $table->dropColumn(['is_combo', 'combo_properties']);
        });
    }
}
