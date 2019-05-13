<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriterioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->bigInteger('fk_id_tipo')->unsigned();
            $table->foreign('fk_id_tipo')
                ->references('id')
                ->on('tipo_criterio')
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
        Schema::dropIfExists('criterio');
    }
}
