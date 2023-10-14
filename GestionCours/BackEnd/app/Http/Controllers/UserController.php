<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\resources\UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function specificUser($role)
    {
        $users = User::where('role',$role)->get();
        return UserResource::collection($users);
    }


    public function register(UserRequest $request)
    {
       return DB::transaction(function () use ($request)
       {
            User::create([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'grade'=>$request->grade,
                'specialite'=>$request->specialite,
                'login'=>$request->login,
                'password'=>Hash::make($request->password,[
                    'rounds' => 12
                ]),
                'role'=>$request->role,
            ]);
            return response()->json(['message','user created successfully']);
       });
    }


   /************  import fichier excel *********/
   public function import(Request $request) 
   {
       $file = $request->file('file');
    //    return $file;
    //    Excel::import(new UsersImport, $file);
       $data = Excel::toCollection(new UsersImport, $file);
    //    return $data;
       foreach ($data[0] as $row) {
        foreach ($row as $cell) {
           $etu = new UsersImport();
           $save = $etu->model($cell);
           $idEtu = $save->save();
           Inscription::create([
            'etudiant_id'=>$idEtu->id,
            'classe_id'=>$request->classe_id,
            'annee_id'=>$request->annee_id
           ]);
           Classe::where('id',$request->classe_id)->first()
                    ->increment('effectif');
        }
    }

       
       return response()->json(['messages'=>'Inscription effectuée avec succes']);
   }

    public function login(LoginRequest $request)
    {
        if(auth()->attempt($request->only(['login','password'])))
        {
            $user = auth()->user();
            $token = $user->createToken('Back_tok')->plainTextToken;

            return response()->json([
                'status'=>200,
                'messages'=>'Utilisateur connecté',
                'user'=>$user,
                'token'=>$token
            ]);
        }
        else
        {
            return response()->json([
                'status'=>403,
                'messages'=>'informations incorrectes'
            ]);
        }
    }


    
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status'=>200,
            'messages'=>'deconnecter avec success'
        ]); 
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
