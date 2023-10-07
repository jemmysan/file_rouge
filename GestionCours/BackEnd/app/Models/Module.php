<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProfModule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $guarded = ['id','libelle'];


    public function profs()
    {
        return $this->belongsToMany(User::class,'prof_modules','professeur_id','module_id');
    }
}
