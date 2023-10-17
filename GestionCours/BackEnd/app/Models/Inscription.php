<?php

namespace App\Models;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inscription extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];


    public function etudiant()
    {
        return $this->belongsTo(User::class,'etudiant_id');
    }

    public function classe()
    {
         return $this->belongsTo(Classe::class,'classe_id');
    }
}
