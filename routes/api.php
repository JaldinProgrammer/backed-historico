<?php

use App\Http\Controllers\EnrolledController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login',[UserController::class,'login']);
Route::post('/signup',[UserController::class,'signup']);
Route::get('/semester/all',[SemesterController::class,'index']);
Route::get('/subject/all',[SubjectController::class,'index']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',[UserController::class,'logout']);
    Route::post('/logout/all',[UserController::class,'logoutAll']); 
    Route::get('/user',[UserController::class,'getUserLogged']); 
    Route::get('/loggedUser/subjects',[EnrolledController::class,'index']); 
    Route::post('/loggedUser/subjects/store',[EnrolledController::class,'store']);
    Route::post('/loggedUser/subjects/update',[EnrolledController::class,'update']); 
    Route::post('/loggedUser/subjects/destroy',[EnrolledController::class,'destroy']); 
    Route::get('/subjects/ppa',[EnrolledController::class,'getPpa']); 
   
});
