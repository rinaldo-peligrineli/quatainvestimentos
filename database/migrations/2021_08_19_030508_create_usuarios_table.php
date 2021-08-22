<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_usuario', 100);
            $table->string('email', 255);
            $table->string('senha', 255);
            $table->integer('nivel_acesso_id')->nullable()->unsigned();
            $table->integer('status')->nullable()->unsigned();
            $table->integer('idade')->nullable()->unsigned();
            $table->decimal('saldo', 10, 2);
            $table->text('observacoes');
            $table->foreign('nivel_acesso_id')->references('id')->on('nivel_acesso');
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
        Schema::table('usuarios', function (Blueprint $table) {
            //
        });
    }
}
