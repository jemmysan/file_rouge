<?php

namespace App\Http\Controllers;

use App\Models\SessionCours;
use Illuminate\Http\Request;
use App\Models\AnnuleSession;
use App\Http\Requests\StoreAnnuleSessionRequest;
use App\Http\Requests\UpdateAnnuleSessionRequest;

class AnnuleSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idsess = $request->id;
       $annule =  AnnuleSession::create([
            "session_cours_id" =>$idsess,
            'motif'=>$request->motif,
            'etat'=>'en cours'
       ]);

       return $annule;
    }

    public function TraiterDemandeAnnulation(Request $request)
    {
        $id = $request->id;
        $annule = AnnuleSession::where('id',$id)->first();
        

    }

    /**
     * Display the specified resource.
     */
    public function show(AnnuleSession $annuleSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnnuleSession $annuleSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnuleSessionRequest $request, AnnuleSession $annuleSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnnuleSession $annuleSession)
    {
        //
    }
}
