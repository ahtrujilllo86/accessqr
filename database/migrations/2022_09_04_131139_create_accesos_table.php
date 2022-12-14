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
        Schema::create('accesos', function (Blueprint $table) {
            $table->id();
            $table->string('indexacceso');
            $table->string('idusuario');
            $table->string('idfrac');
            $table->string('tipo');
            $table->string('nombre');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('color')->nullable();
            $table->string('placas')->nullable();
            $table->timestamp('inicio')->nullable();
            $table->timestamp('fin')->nullable();
            $table->string('vigente');
            $table->string('casa');
            $table->string('autoriza');
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
        Schema::dropIfExists('accesos');
    }
};
