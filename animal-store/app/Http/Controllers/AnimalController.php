<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        $species = Species::all();
        $breeds = Breed::all();
        return view('animals.create', compact('species', 'breeds'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'species_id' => 'required|exists:species,id',
            'breed_id' => 'required|exists:breeds,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate the image file
        ]);

        // Handle the image upload if it exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('animals', 'public'); // Store in 'public/animals' folder
        } else {
            $imagePath = null; // No image uploaded
        }

        // Create the animal record
        Animal::create([
            'name' => $validated['name'],
            'birth_date' => $validated['birth_date'],
            'species_id' => $validated['species_id'],
            'breed_id' => $validated['breed_id'],
            'image' => $imagePath, // Save the image path in the database
        ]);

        return redirect()->route('animals.index');
    }

    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animals.show', compact('animal'));
    }

    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $species = Species::all();
        $breeds = Breed::all();
        return view('animals.edit', compact('animal', 'species', 'breeds'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string',
            'birth_date' => 'required|date',
            'species_id' => 'required|exists:species,id',
            'breed_id' => 'required|exists:breeds,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate the image file
        ]);

        // Handle the image upload if it exists
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('animals', 'public'); // Store in 'public/animals' folder
            $animal->image = $imagePath; // Update the image path
        }

        // Update the animal record
        $animal->update($validated);

        return redirect()->route('animals.index');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('animals.index');
    }
}
