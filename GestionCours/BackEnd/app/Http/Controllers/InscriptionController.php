<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use App\Http\Resources\resources\InscriptionResource;

class InscriptionController extends Controller
{
    public function index()
    {
        
    }
   
    public function listOfStudent($idClass)
    {
        $listClasse = Inscription::where('classe_id',$idClass)->get();
        return InscriptionResource::collection($listClasse);

    }
}
