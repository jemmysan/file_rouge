<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use App\Models\SessionCours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\resources\SessionCoursResource;

class SessionCoursController extends Controller
{
    /**
     * Display a listing of the resource.
     
     */
    // public function getSalle(){

    //      return Salle::all();
    //  }

    public function index($idCours)
    {
        return SessionCoursResource::collection(SessionCours::where('cours_id',$idCours)->get());
        // return SessionCoursResource::collection(SessionCours::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use($request){
            $hd = strtotime('1970-01-01'.' '.$request->heure_debut);
            $hf = strtotime('1970-01-01'.' '.$request->heure_fin);
            SessionCours::create([
                'cours_id'=>$request->cours_id,
                'salle_id'=>$request->salle_id,
                'date'=>$request->date,
                'heure_debut'=>$hd,
                'heure_fin'=>$hf,
                'type_session'=>$request->type,
                'duree'=> $hf - $hd
            ]);

            return response()->json([
                "status"=>200,
                "messages"=>'session ajouter avec succes'
            ]);
        });    
    }

    public function sessionOfCours($idCours)
    {
        $session = SessionCours::where('cours_id',$idCours)->get();
        return SessionCoursResource::collection($session);
    }

    /**
     * Display the specified resource.
     */
    public function show(SessionCours $sessionCours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SessionCours $sessionCours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SessionCours $sessionCours)
    {
        //
    }
}
