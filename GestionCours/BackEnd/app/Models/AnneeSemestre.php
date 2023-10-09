<?php

namespace App\Models;

use App\Models\Annee;
use App\Models\Cours;
use App\Models\Semestre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnneeSemestre extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function annee()
    {
        return $this->belongsTo(Annee::class);
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }

    
}
