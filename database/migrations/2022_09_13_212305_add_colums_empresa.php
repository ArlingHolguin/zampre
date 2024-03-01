<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('empresa')->after('city')->nullable();
            //Cedula de ciudadanía /Cedula de extranjería / Tarjeta de identidad / Pasaporte
            $table->enum('document_type', ['CC', 'CE', 'TI', 'PASS', 'RUT', 'NIT'])->after('empresa')->nullable();
            $table->string('document_number')->after('document_type')->nullable();
            $table->unique(['document_type', 'document_number']);


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('empresa');
            $table->dropColumn('document_type');
            $table->dropColumn('document_number');
        });
    }
}
