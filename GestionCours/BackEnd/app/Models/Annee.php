<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at','updated_at'];

    public function anneeSemestres()
    {
        return $this->belongsToMany(AnneeSemestre::class,
        'annee_semestres','annee_id','semestre_id');
    }
}
