<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipuri_evenimente_departamente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eveniment_id');
            $table->unsignedBigInteger('departament_id');
            $table->timestamps();
            
            $table->foreign('eveniment_id')->references('id')->on('tipuri_evenimente')->onDelete('cascade');
            $table->foreign('departament_id')->references('id')->on('departamente')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tipuri_evenimente_posturi');
    }
};