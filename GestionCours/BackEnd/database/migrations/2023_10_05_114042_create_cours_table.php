<?php

use App\Models\Classe;
use App\Models\ProfModule;
use App\Models\AnneeSemestre;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AnneeSemestre::class)->constrained();
            $table->foreignIdFor(ProfModule::class)->constrained();
            $table->foreignIdFor(Classe::class)->constraind();
            $table->integer('quantum_horaire');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
