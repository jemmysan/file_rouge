<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SessionCoursController;
use App\Http\Controllers\AnnuleSessionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/**** User *****/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('users')->group(function (){
    Route::post('/register',[UserController::class,'register']);
    Route::post('/login',[UserController::class,'login']);
    Route::post('/logout',[UserController::class,'logout'])->middleware('auth:sanctum');
    Route::post('/import',[UserController::class,'import']);

    Route::get('/{role}',[UserController::class,'specificUser']);
});


/**** Module *****/
Route::prefix('module')->group(function (){
    Route::get('',[ModuleController::class,'index']);
});


/**** Semestre *****/
Route::prefix('semestre')->group(function (){
    Route::get('',[SemestreController::class,'index']);
});


/**** Classe ******/
Route::prefix('classe')->group(function (){
    Route::get('',[ClasseController::class,'index']);
});



/**** Cours ******/
Route::prefix('cours')->group(function (){
    Route::post('/addCours',[CoursController::class,'store']);

    Route::get('lister',[CoursController::class,'index']);
    Route::get('/coursComponents',[CoursController::class,'coursElements']);
    Route::get('/profCours/{idProf}',[CoursController::class,'getProfCourses']);

});


/**** Session_Cours ******/
Route::prefix('sessionCours')->group(function (){
    Route::post('/ajout',[SessionCoursController::class,'store']);

    Route::get('/list/{idC}',[SessionCoursController::class,'index']);
    Route::get('/salle',[SessionCoursController::class,'getSalle']);
    Route::get('/cours/{idCours}',[SessionCoursController::class,'sessionOfCours']);

});


/***** Salle *******/
Route::prefix('salle')->group(function (){
    Route::get('/{tailleSal}',[SalleController::class,'getSalleSupEgalTaillClasse']);
});


Route::prefix('inscription')->group(function () {
    Route::get('/list/class/{idCl}',[InscriptionController::class,'listOfStudent']);
});

/****** Annulation Session ***********/
Route::prefix('annuleSession')->group(function (){
    Route::post('/annule',[AnnuleSessionController::class,'store']);
});