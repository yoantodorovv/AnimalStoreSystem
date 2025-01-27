<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Species>
 */
class SpeciesFactory extends Factory
{
    private $speciesNames = [
        'Dog', 'Cat', 'Rabbit', 'Hamster', 'Bird', 'Fish', 'Reptile', 'Ferret', 'Turtle', 'Guinea Pig',
        'Snake', 'Lizard', 'Horse', 'Parrot', 'Chinchilla', 'Frog', 'Chicken', 'Duck', 'Goat', 'Pig'
    ];

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement($this->speciesNames),
        ];
    }
}
