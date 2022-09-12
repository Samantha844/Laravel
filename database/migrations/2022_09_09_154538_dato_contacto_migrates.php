<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatosContactoMigrates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('datoscontacto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('empleado_id',false,true);
            $table->string('nombre_contacto', 50);
            $table->string('email', 50);
            $table->string('telefono',50);
            $table->string('direccion',50);
            $table->string('ciudad',50);
            $table->tinyInteger('estado');
            $table->string('cp',5);


            $table->boolean('principal')->default('0');
            $table->boolean('eliminado')->default('0');
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
        //
    }
}
