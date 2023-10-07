<?php

use App\Models\Cours;
use App\Models\Salle;
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
        Schema::create('session_cours', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cours::class)->constrained();
            $table->foreignIdFor(Salle::class)->constrained();
            $table->string('etat');
            $table->boolean('valide')->default(false);
            $table->foreignId('attache_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_cours');
    }
};
