<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('tipo_doc');
            $table->index(['tipo_doc', 'documento']);
            $table->string('documento',10);
            $table->unique('documento');
            $table->string('nombre',45);
            $table->string('apellido',45);
            $table->date('fecha_nac');
            $table->string('sexo',10);
            $table->string('telefono',21);
            $table->string('direccion',100);
            $table->integer('altura');
            $table->string('foto',200);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('tipo_doc')->references('id')->on('tipo_documento')->onDelete('restrict');
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
        Schema::dropIfExists('cliente');
        Schema::dropIfExists('persona');
        Schema::dropIfExists('tipo_cliente');
        Schema::dropIfExists('users');
        
       
        
    }
}
