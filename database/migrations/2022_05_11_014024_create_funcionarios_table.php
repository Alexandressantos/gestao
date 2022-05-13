<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id('cd_funcionario');
            $table->unsignedBigInteger('cd_emp');
            $table->string('nome',50);
            $table->string('sobrenome',50);
            $table->string('email',50)->nullable();
            $table->string('telefone',11)->nullable();
            $table->timestamps();

            //Constraint
            $table->foreign('cd_emp')->references('cd_emp')->on('empresas');
            //$table->unique('empresa_cd_emp');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
