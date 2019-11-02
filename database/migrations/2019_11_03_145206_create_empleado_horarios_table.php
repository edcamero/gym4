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
            $table->foreign('id_hor')->references('id')->on('horario');
            $table->Integer('id_emp');
            $table->foreign('id_emp')->references('id')->on('empleados');
            $table->Date('dia');
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
        Schema::dropIfExists('empleado_horarios');
    }
}
