<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Resources\resources\ModuleResource;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ModuleResource::collection(Module::all());
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
    public function show(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $module)
    {
        //
    }
}
