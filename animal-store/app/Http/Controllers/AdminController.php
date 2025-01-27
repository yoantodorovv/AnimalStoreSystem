<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Breed;
use App\Models\Species;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // Manage Animals
    public function manageAnimals()
    {
        $animals = Animal::all();
        return view('admin.animals.index', compact('animals'));
    }

    public function createAnimal()
    {
        $species = Species::all();
        $breeds = Breed::all();
        return view('admin.animals.create', compact('species', 'breeds'));
    }

    public function storeAnimal(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('animals', 'public');
        } else {
            $imagePath = null; 
        }
    
        Animal::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'species_id' => $request->species_id,
            'breed_id' => $request->breed_id,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('admin.animals.index');
    }

    public function editAnimal(Animal $animal)
    {
        $species = Species::all();
        $breeds = Breed::all();
        return view('admin.animals.edit', compact('animal', 'species', 'breeds'));
    }

    public function updateAnimal(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            if ($animal->image) {
                Storage::delete('public/' . $animal->image);
            }
    
            $imagePath = $request->file('image')->store('animals', 'public');
        } else {
            $imagePath = $animal->image;
        }
    
        $animal->update([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'species_id' => $request->species_id,
            'breed_id' => $request->breed_id,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('admin.animals.index');
    }

    public function deleteAnimal(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('admin.animals.index');
    }

    // Manage Breeds
    public function manageBreeds()
    {
        $breeds = Breed::all();
        return view('admin.breeds.index', compact('breeds'));
    }

    public function createBreed()
    {
        return view('admin.breeds.create');
    }

    public function storeBreed(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $specie = Species::where('name', $request->input('specie'))->first();

        if (!$specie) {
            return redirect()->back()->with('error', 'Specie not found!');
        }

        $request['species_id'] = $specie->id;

        Breed::create($request->all());
        return redirect()->route('admin.breeds.index');
    }

    public function editBreed(Breed $breed)
    {
        return view('admin.breeds.edit', compact('breed'));
    }

    public function updateBreed(Request $request, Breed $breed)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $breed->update($request->all());
        return redirect()->route('admin.breeds.index');
    }

    public function deleteBreed(Breed $breed)
    {
        $breed->delete();
        return redirect()->route('admin.breeds.index');
    }

    // Manage Species
    public function manageSpecies()
    {
        $species = Species::all();
        return view('admin.species.index', compact('species'));
    }

    public function createSpecie()
    {
        return view('admin.species.create');
    }

    public function storeSpecie(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Species::create($request->all());
        return redirect()->route('admin.species.index');
    }

    public function editSpecie(Species $specie)
    {
        return view('admin.species.edit', compact('specie'));
    }

    public function updateSpecie(Request $request, Species $specie)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $specie->update($request->all());
        return redirect()->route('admin.species.index');
    }

    public function deleteSpecie(Species $specie)
    {
        $specie->delete();
        return redirect()->route('admin.species.index');
    }

    // Manage Users

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('admin.users.index');
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
