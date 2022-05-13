<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaIdToTareasTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tareas', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id')->unsigned();
            $table
                ->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->after('nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tareas', function (Blueprint $table) {
            //
        });
    }
}
