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
        Schema::create('utilizatori_evenimente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eveniment_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('confirmare_disponibilitate')->default(false);
            

            $table->timestamps();

            $table->foreign('eveniment_id')->references('id')->on('evenimente')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilizatori_evenimente');
    }
};
