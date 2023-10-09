<?php

namespace App\Models;

use App\Models\User;
use App\Models\AnneeSemestre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cours extends Model
{
    use HasFactory;

    protected $fillable= [
        'annee_semestre_id',
        'prof_module_id',
        'classe_id',
        'quantum_horaire'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function prof()
    {
        return $this->belongsTo(User::class);
    }

    public function anneeSemestre()
    {
        return $this->belongsTo(AnneeSemestre::class,'annee_semestre_id');
    }

    public function profModule()
    {
        return $this->belongsTo(ProfModule::class,'prof_module_id');
    }
}
