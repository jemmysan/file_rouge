<?php

namespace App\Models;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function filiere()
    {
        return $this->hasOne(Filiere::class);
    }
}
