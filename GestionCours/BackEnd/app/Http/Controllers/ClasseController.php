<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Resources\resources\ClasseResource;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return ClasseResource::collection(Classe::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
