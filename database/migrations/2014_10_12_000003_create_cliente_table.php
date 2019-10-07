<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('pers_id');
            $table->unsignedInteger('tipo_cliente_id');            
            $table->foreign('pers_id')->references('id')->on('persona');
            $table->foreign('tipo_cliente_id')->references('id')->on('tipo_cliente');
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
    }
}
