<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('departament_function', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departament_id');
            $table->unsignedBigInteger('function_model_id');
            $table->timestamps();
    
            $table->foreign('departament_id')->references('id')->on('departamente')->onDelete('cascade');
            $table->foreign('function_model_id')->references('id')->on('functions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departament_function');
    }
};
