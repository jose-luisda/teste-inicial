<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 70);
            $table->integer('rg');
            $table->integer('cpf');
            $table->char('cnh', 100);
            $table->char('ctps', 100);
            $table->integer('pis');
            $table->char('titulo', 45);
            $table->char('passaporte', 45);
            $table->char('tipo_tel', 20);
            $table->integer('telefone');
            $table->char('operadora', 20);
            $table->char('tipo_email', 20);
            $table->char('email', 45);
            
            
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
        Schema::dropIfExists('pessoas');
    }
}
