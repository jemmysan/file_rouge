<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
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
