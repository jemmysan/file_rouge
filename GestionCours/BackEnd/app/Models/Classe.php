<?php

namespace App\Models;

use App\Models\User;
use App\Models\Cours;
use App\Models\Filiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classe extends Model
{
    use HasFactory;

    protected $guarded = [];

     protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function filiere()
    {
        return $this->hasOne(Filiere::class);
    }

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    public function eleves()
    {
        return $this->hasMany(User::class);
    }
}
