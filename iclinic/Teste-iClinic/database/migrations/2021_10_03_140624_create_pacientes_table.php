<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50)->nullable(false);
            $table->string('sobrenome', 50)->nullable(false);
            $table->string('cpf', 11);
            $table->date('data_nascimento');
            $table->string('email', 150);
            $table->integer('id_tipo_sanguineo')->nullable(false);
            $table->foreign('id_tipo_sanguineo')->references('id')->on('tipo_sanguineos')->onDelete('cascade')->onUpdate('cascade');;
            $table->string('genero', 1);
            $table->string('endereco', 200);
            $table->string('cidade', 200);
            $table->char('estado', 2);
            $table->string('cep', 9);
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
        Schema::dropIfExists('pacientes');
    }
}
