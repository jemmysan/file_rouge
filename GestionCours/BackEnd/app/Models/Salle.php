<?php

namespace App\Models;

use App\Models\Cours;
use App\Models\SessionCours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salle extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $hidden = ['created_at','update_at'];


    public function sessions()
    {
        return $this->hasMany(SessionCours::class);
    }
}
