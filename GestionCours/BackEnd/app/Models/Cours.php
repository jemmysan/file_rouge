<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
