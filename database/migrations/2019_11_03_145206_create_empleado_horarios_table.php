<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_horarios', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('id_hor')->unsigned();
            $table->foreign('id_hor')->references('id')->on('horario')->onDelete('cascade');
            $table->Integer('id_emp')->unsigned();
            $table->foreign('id_emp')->references('id')->on('empleados')->onDelete('cascade');
            $table->Date('dia');
            $table->timestamps();
            $table->unique(['id_hor','id_emp','dia']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_horarios');
    }
}
