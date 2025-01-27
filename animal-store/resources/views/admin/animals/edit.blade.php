@extends('layouts.layout')

@section('title', 'Animals | Edit')

@section('content')
    <h1>Create Animal</h1>
    <form action="{{ route('admin.animals.update', $animal) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $animal->name }}" required>

        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" id="birth_date" value="{{ $animal->birth_date }}" required>

        <label for="species_id">Species:</label>
        <select name="species_id" id="species_id" required>
            @foreach($species as $specie)
                <option value="{{ $specie->id }}" @if($specie->id == $animal->species_id) selected @endif>
                    {{ $specie->name }}
                </option>
            @endforeach
        </select>

        <label for="breed_id">Breed:</label>
        <select name="breed_id" id="breed_id" required>
            @foreach($breeds as $breed)
                <option value="{{ $breed->id }}" @if($breed->id == $animal->breed_id) selected @endif>
                    {{ $breed->name }}
                </option>
            @endforeach
        </select>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*">
        
        @if($animal->image)
            <div>
                <img src="{{ asset('storage/' . $animal->image) }}" alt="Animal Image" width="100">
            </div>
        @endif

        <button type="submit">Update</button>
    </form>
@endsection