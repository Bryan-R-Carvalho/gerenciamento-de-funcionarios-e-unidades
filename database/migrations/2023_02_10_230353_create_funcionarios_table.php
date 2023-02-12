<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('idade');
            $table->string('documento');
            $table->foreignId('id_endereco')->constrained('id')->on('enderecos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_unidade')->constrained('id')->on('unidades')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
};
