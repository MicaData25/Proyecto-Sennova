<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->year('ano');
            $table->string('lider');
            $table->string('programaFormacion');
            $table->decimal('valorFinanciero', 15, 2);
            $table->string('productos');
            $table->string('ponencias');
            $table->string('edt');
            $table->string('libro');
            $table->string('articulo');
            $table->string('tipo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proyectos');
    }
}
