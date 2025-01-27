<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Breed;
use App\Models\Species;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    private $animalNames = [
        'Bella', 'Max', 'Charlie', 'Luna', 'Cooper', 'Milo', 'Lucy', 'Daisy', 'Rocky', 'Bailey',
        'Sadie', 'Buddy', 'Oscar', 'Toby', 'Oliver', 'Jack', 'Sophie', 'Chloe', 'Zoe', 'Maggie',
        'Riley', 'Teddy', 'Ruby', 'Leo', 'Jasper', 'Louie', 'Lily', 'Finn', 'Nala', 'Rex'
    ];

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->animalNames),
            'birth_date' => $this->faker->date(),
            'species_id' => Species::inRandomOrder()->first()->id, 
            'breed_id' => Breed::inRandomOrder()->first()->id, 
        ];
    }
}
