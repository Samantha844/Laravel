<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmpleadoTable extends Migration
{
    public function __construct()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleado', function (Blueprint $table) {
            //cambiar telefono a string
            $table->string('telefono',20)->change();
            //Cambiar tamaño nombre a 60
            $table->string('nombre',60)->change();
            //Permitir null en apellido materno
            $table->string('apellido_materno',30)->nullable()->change();
            //Agregamos columna ciudad
            $table->string('ciudad',50)->after('direccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleado', function (Blueprint $table) {
            //cambiar telefono a char
            $table->string('telefono',15)->change();
            //Cambiar tamaño nombre a 50
            $table->string('nombre',50)->change();
            //Quitamos nullable en apellido materno
            $table->string('apellido_materno',30)->nullable($value = false)->change();
            //Eliminamos columna ciudad
            $table->dropColumn('ciudad');
        });
    }
}
