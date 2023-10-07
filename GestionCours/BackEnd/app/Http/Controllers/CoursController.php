<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Module;
use App\Models\Semestre;
use App\Models\ProfModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CoursRequest;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SemestreController;


class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    public function coursElements()
    {
        $modules = new ModuleController;
        $semestres = new SemestreController;
        $classes = new ClasseController;
        $profs = new UserController;
        
        $mod = $modules->index();
        $sem = $semestres->index();
        $cl = $classes->index();
        $pf = $profs->specificUser('Prof');

        return response()->json([
                'modules'=>$mod,
                'semestres'=>$sem,
                'classes'=>$cl,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoursRequest $request)
    { 
        $module = $request->module ;
        $prof = $request->professeur;
        $prof_module_id = ProfModule::where('professeur_id',$prof)
        ->where('module_id',$module)->first()->id;

        return DB::transaction(function () use($request,$prof_module_id){
            $cours = Cours::create([
                'annee_semestre_id'=> $request->validated()['semestre_id'],
                'prof_module_id'=>$prof_module_id,
                'classe_id'=>$request->validated()['classe_id'],
                'quantum_horaire'=>$request->validated()['quantum_horaire']
            ]);
            return $cours;
       });
    }

    /**
     * Display the specified resource.
     */
    public function show(Cours $cours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cours $cours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cours $cours)
    {
        //
    }
}
