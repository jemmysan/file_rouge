<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
}
