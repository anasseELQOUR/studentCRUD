<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etudiant;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Etudiant::factory(50)->create();

       // $this->call(ClassesTableSeeder::class); utilisé au début pour faire apppel ClasseTableSeeder afin de l'exécuter pr créer la table classe
    }
}
