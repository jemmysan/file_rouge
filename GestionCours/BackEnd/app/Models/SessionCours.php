<?php

namespace App\Models;

use App\Models\Cours;
use App\Models\Salle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SessionCours extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at','updated_at'];

    public function cours()
    {
        return $this->belongsTo(Cours::class,'cours_id');
    }

    public function salle()
    {
        return $this->belongsTo(Salle::class,'salle_id');
    }
}
