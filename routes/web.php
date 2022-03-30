<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/etudiant', [EtudiantController::class, "index"])->name("etudiant");
Route::get('/etudiant/create', [EtudiantController::class, "create"])->name("etudiant.create");
Route::get('/etudiant/{etudiant}', [EtudiantController::class, "edit"])->name("etudiant.edit");


Route::post('/etudiant/create', [EtudiantController::class, "store"])->name("etudiant.ajouter");
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, "destroy"])->name("etudiant.supprimer");
Route::put('/etudiant/{etudiant}', [EtudiantController::class, "update"])->name("etudiant.update");
