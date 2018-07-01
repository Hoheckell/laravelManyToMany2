<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableModalidadesProfessores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidades_professores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professor_id')->unsigned();
            $table->integer('modalidade_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('modalidades_professores', function (Blueprint $table){
            $table->foreign('professor_id')->references('id')->on('professores')->onDelete('cascade');
            $table->foreign('modalidade_id')->references('id')->on('modalidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidades_professores');
    }
}
