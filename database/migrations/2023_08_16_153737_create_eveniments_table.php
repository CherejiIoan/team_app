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
        Schema::create('evenimente', function (Blueprint $table) {
            $table->id();
            $table->string('nume_eveniment');
            $table->date('data_eveniment');
            $table->time('ora_eveniment');
            $table->string('recurenta')->default('zilnic');
            $table->unsignedBigInteger('tip_eveniment_id')->nullable();
            $table->string('notite');

            $table->timestamps();

            
            // Adaugă constrângerea pentru cheia străină către tabela tipuri_evenimente
            $table->foreign('tip_eveniment_id')->references('id')->on('tipuri_evenimente')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenimente');
    }
};
