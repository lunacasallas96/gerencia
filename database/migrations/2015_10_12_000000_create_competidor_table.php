<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetidorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competidor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('fk_empresa')->unsigned();
            $table->foreign('fk_empresa')
                ->references('id')
                ->on('empresas')
                ->onDelete('cascade');
            $table->bigInteger('fk_criterio')->unsigned();
            $table->foreign('fk_criterio')
                ->references('id')
                ->on('criterio')
                ->onDelete('cascade');
            $table->bigInteger('fk_escala')->unsigned();
            $table->foreign('fk_escala')
                ->references('id')
                ->on('escala_criterio')
                ->onDelete('cascade');
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
        Schema::dropIfExists('competidor');
    }
}
