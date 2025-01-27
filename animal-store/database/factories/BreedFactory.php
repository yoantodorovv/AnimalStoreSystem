<?php

namespace Database\Factories;

use App\Models\Species;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Breed>
 */
class BreedFactory extends Factory
{
    private $breedsBySpecies = [
        'Dog' => ['Bulldog', 'Labrador', 'Poodle', 'Beagle', 'Rottweiler', 'German Shepherd', 'Chihuahua', 'Cocker Spaniel', 'Boxer', 'Golden Retriever', 'Pit Bull', 'Shih Tzu', 'Dachshund', 'Pomeranian', 'Border Collie'],
        'Cat' => ['Siamese', 'Persian', 'Bengal', 'Maine Coon', 'Abyssinian', 'Sphynx', 'Russian Blue', 'Ragdoll', 'Scottish Fold', 'Burmese'],
        'Rabbit' => ['Himalayan', 'Angora', 'Mini Rex', 'Holland Lop', 'Dutch', 'Flemish Giant', 'Netherland Dwarf', 'English Angora', 'English Spot'],
        'Hamster' => ['Syrian', 'Roborovski', 'Winter White', 'Dwarf Campbell', 'Chinese'],
        'Bird' => ['Parrot', 'Canary', 'Finch', 'Cockatiel', 'Macaw', 'Budgie', 'Lovebird', 'Pigeon', 'Quail', 'Lorikeet'],
        'Fish' => ['Goldfish', 'Betta', 'Guppy', 'Angelfish', 'Tetra', 'Oscar', 'Cichlid', 'Koi', 'Neon Tetra', 'Barb'],
        'Reptile' => ['Bearded Dragon', 'Leopard Gecko', 'Chameleon', 'Iguana', 'Ball Python', 'Corn Snake', 'Tortoise', 'Water Dragon'],
        'Ferret' => ['Sable', 'Albino', 'Champagne', 'Cinnamon', 'Black', 'Silver'],
        'Turtle' => ['Box Turtle', 'Red-eared Slider', 'Snapping Turtle', 'Russian Tortoise'],
        'Guinea Pig' => ['Abyssinian', 'American', 'Peruvian', 'Silkie', 'Texel'],
        'Snake' => ['Corn Snake', 'Ball Python', 'King Snake', 'Garter Snake'],
        'Lizard' => ['Bearded Dragon', 'Gecko', 'Anole', 'Iguana', 'Chameleon'],
        'Horse' => ['Arabian', 'Quarter Horse', 'Thoroughbred', 'Clydesdale', 'Shetland Pony', 'Andalusian'],
        'Parrot' => ['Macaw', 'African Grey', 'Cockatoo', 'Budgie', 'Conure'],
        'Chinchilla' => ['Standard', 'Hetero Beige', 'White', 'Black'],
        'Frog' => ['American Bullfrog', 'African Clawed Frog', 'Pacman Frog', 'Tree Frog'],
        'Chicken' => ['Rhode Island Red', 'Leghorn', 'Plymouth Rock', 'Silkie', 'Orpington'],
        'Duck' => ['Mallard', 'Pekin', 'Indian Runner', 'Khaki Campbell', 'Rouen'],
        'Goat' => ['Nubian', 'Boer', 'Alpine', 'Angora', 'LaMancha'],
        'Pig' => ['Yorkshire', 'Landrace', 'Duroc', 'Tamworth', 'Berkshire'],
    ];
    
    public function definition()
    {
        $speciesName = Species::inRandomOrder()->first()->name;
        $breeds = $this->breedsBySpecies[$speciesName] ?? [];

        return [
            'name' => $this->faker->randomElement($breeds),
            'species_id' => Species::where('name', $speciesName)->first()->id,
        ];
    }
}
