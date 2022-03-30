<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string("Nom");
            $table->string("Prénom");
            $table->foreignId("classe_id")->constrained("classes");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints(); // ce morceau de code veut simplement dire à laravel d'appliquer la contrainte d'intégrité sur la clès étrangère
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table("etudinats", function(Blueprint $table){
                $table->dropForeign("classe_id");
        });
        Schema::dropIfExists('etudiants');
    }
}
