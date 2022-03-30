<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Classe;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::orderBy("Nom", "asc")->paginate(10); // et on peut récuperer les données simplement avec Etudiant::all()
        return view("etudiant", compact("etudiants"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        return view("createEtudiant", compact("classes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "Nom"=>"required",
            "Prénom"=>"required",
            "classe_id"=>"required",
        ]);
        // on peut faire cela
        //Etudiant::create($request->all()); // on peut remplacer all par validated() pour créer le nouveau étudiant et la $request va récuperer toutes les valeurs du formulaire et va créer la requête
        // et pour que ceci marche on doit créer dans Etudiant Model une variable $fillable voir model etudiant  
        //sinon on peut précedre de la façon suivante
        Etudiant::create([
            "Nom"=>$request->Nom,
            "Prénom"=>$request->Prénom,
            "classe_id"=>$request->classe_id
        ]);

        return back()->with("success", "Etudiant enregistré avec succès!"); // voir createEtudiant
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $classes = Classe::all();
        return view("editEtudiant", compact("etudiant", "classes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
    
        $request->validate([
            "Nom"=>"required",
            "Prénom"=>"required",
            "classe_id"=>"required",
        ]);
        // on peut faire cela
        //Etudiant::create($request->all()); // on peut remplacer all par validated() pour créer le nouveau étudiant et la $request va récuperer toutes les valeurs du formulaire et va créer la requête
        // et pour que ceci marche on doit créer dans Etudiant Model une variable $fillable voir model etudiant  
        //sinon on peut précedre de la façon suivante
        $etudiant->update([
            "Nom"=>$request->Nom,
            "Prénom"=>$request->Prénom,
            "classe_id"=>$request->classe_id
        ]);

        return back()->with("success", "Etudiant mis à jour avec succès!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //Première méthode de suppression 
    public function destroy(Etudiant $etudiant)
    {
        $nomComplet = $etudiant->Nom.' '.$etudiant->Prénom;
        $etudiant->delete();
        return back()->with("successDelete", "L'étudiant '$nomComplet' supprimé avec succès!"); // voir etudiant.blade.php
    }
     // Deuxième méthode de surppression on procéder ainsi
    public function delete($etudiant)
    {
        Etudiant::find($etudiant)->delete();
        return back()->with("successDelete", "Etudiant supprimé avec succès!"); // voir etudiant.blade.php
    }
}
