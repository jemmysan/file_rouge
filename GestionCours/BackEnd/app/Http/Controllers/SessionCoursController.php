<?php

namespace App\Http\Controllers;

use App\Models\SessionCours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionCoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use($request){
            SessionCours::create([
                'cours_id'=>$request->cours_id,
                'salle_id'=>$request->salle_id,
                'date'=>$request->date,
                'heure_debut'=>$request->heure_debut,
                'heure_fin'=>$request->heure_fin,
                'type_session'=>$request->type_session,
                'duree'=> $request->heure_fin - $request->heure_debut
            ]);

            return response()->json([
                "status"=>200,
                "messages"=>'session ajouter avec succes'
            ]);
        });    
    }

    public function checkSession()
    {

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
