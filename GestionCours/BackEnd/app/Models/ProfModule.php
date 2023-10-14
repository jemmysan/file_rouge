<?php

namespace App\Models;

use App\Models\User;
use App\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfModule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['created_at','updated_at'];
    
    public function prof()
    {
        return $this->belongsTo(User::class,'professeur_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class,'module_id');
    }

    
}
