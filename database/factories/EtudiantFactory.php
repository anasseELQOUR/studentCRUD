<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;

class EtudiantFactory extends Factory
{
    //protected $model = Etudiant::class;
        /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nom' => $this->faker->lastName(),
            'Prénom' => $this->faker->firstName(),
            'classe_id' =>rand(1,7),
            
        ];
    }
}
