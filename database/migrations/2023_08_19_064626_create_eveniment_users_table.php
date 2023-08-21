<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('utilizatori_evenimente', function (Blueprint $table) {
            $table->id();
            $table->integer('eveniment_id');
            $table->integer('user_id');
            $table->boolean('confirmare_disponibilitate');
            $table->timestamps();
            
            $table->foreign('eveniment_id')->references('id')->on('evenimente')->onDelete('cascade');
            $table->foreign('departament_id')->references('id')->on('departamente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilizatori_evenimente');
    }
};
