<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semana');
            $table->string('numero_guia', 20)->nullable();
            $table->date('fecha');
            $table->decimal('precio', 9, 2);
            $table->integer('cantidad');
            $table->unsignedInteger('obra_id');
            $table->unsignedInteger('catalogo_id');
            $table->unsignedInteger('marca_id');
            $table->timestamps();

            $table->foreign('obra_id')->references('id')
                ->on('obras');

            $table->foreign('catalogo_id')->references('id')
                ->on('catalogo');

            $table->foreign('marca_id')->references('id')
                ->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos_producto');
    }
};
