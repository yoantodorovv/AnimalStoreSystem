@extends('layouts.layout')

@section('title', 'Animals | Create')

@section('content')
    <h1>Create Animal</h1>
    <form action="{{ route('admin.animals.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="birth_date">Birth Date:</label>
        <input type="date" name="birth_date" id="birth_date" required>

        <label for="species_id">Species:</label>
        <select name="species_id" id="species_id" required>
            @foreach($species as $specie)
                <option value="{{ $specie->id }}">{{ $specie->name }}</option>
            @endforeach
        </select>

        <label for="breed_id">Breed:</label>
        <select name="breed_id" id="breed_id" required>
            @foreach($breeds as $breed)
                <option value="{{ $breed->id }}">{{ $breed->name }}</option>
            @endforeach
        </select>

        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/*">

        <button type="submit">Save</button>
    </form>
@endsection