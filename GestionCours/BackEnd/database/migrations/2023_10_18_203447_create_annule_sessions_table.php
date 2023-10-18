<?php

use App\Models\SessionCours;
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
        Schema::create('annule_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SessionCours::class)->constrained();
            $table->longText('motif');
            $table->enum('etat',['valide, refuse, en cours']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annule_sessions');
    }
};
