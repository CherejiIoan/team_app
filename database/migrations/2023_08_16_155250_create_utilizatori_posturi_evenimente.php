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
        Schema::create('utilizatori_posturi_evenimente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('utilizatori_evenimente_id');
            $table->unsignedBigInteger('function_id');
            

            $table->timestamps();

            $table->foreign('utilizatori_evenimente_id')->references('id')->on('utilizatori_evenimente')->onDelete('cascade');
            $table->foreign('function_id')->references('id')->on('functions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilizatori_posturi_evenimente');
    }
};
