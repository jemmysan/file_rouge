<?php

namespace App\Http\Controllers;

use App\Models\Cours;
use App\Models\Module;
use App\Models\Semestre;
use App\Models\ProfModule;
use Illuminate\Http\Request;
use App\Models\AnneeSemestre;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CoursRequest;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SemestreController;
use App\Http\Resources\resources\CoursResource;
use App\Http\Resources\resources\ProfModuleResource;
use App\Http\Resources\resources\AnneeSemestreResource;


class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    return AnneeSemestreResource::collection(AnneeSemestre::all());
        return CoursResource::collection(Cours::all());
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
        $semestre = $request->semestre_id;
        $classe = $request->classe_id;

        $checkCours = Cours::where('annee_semestre_id',$semestre)
                            ->where('prof_module_id', $prof_module_id)
                            ->where('classe_id',$classe)->first();

        if($checkCours) return response()->json([
            'message'=>'Vous ne pouvez recréer ce cours car il existe déjà']);
    
        return DB::transaction(function () use($request,$prof_module_id){
            $cours = Cours::create([
                'annee_semestre_id'=> $request->semestre_id,
                'prof_module_id'=>$prof_module_id,
                'classe_id'=>$request->classe_id,
                'quantum_horaire'=>$request->quantum_horaire
            ]);
            return response()->json(['message'=>'Cours créé avec succès']);
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
