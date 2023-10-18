<?php

namespace App\Models;

use App\Models\SessionCours;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnnuleSession extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['created_at','updated_at'];

    public function session()
    {
        return $this->belongsTo(SessionCours::class);
    }
}
