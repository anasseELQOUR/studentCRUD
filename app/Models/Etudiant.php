<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ["Nom", "Prénom", "classe_id"];

    public function classe(){
        return $this->belongsTo(Classe::class); //has one est une relation de one to one
    }
}
