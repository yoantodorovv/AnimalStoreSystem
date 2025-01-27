@extends('layouts.layout')

@section('title', 'Animal')

@section('content')
    <h1>{{ $animal->name }} Details</h1>

    <div>
        <p><strong>Name:</strong> {{ $animal->name }}</p>
        <p><strong>Birth Date:</strong> {{ $animal->birth_date }}</p>
        <p><strong>Species:</strong> {{ $animal->species->name }}</p>
        <p><strong>Breed:</strong> {{ $animal->breed->name }}</p>
        @if($animal->image)
            <img src="{{ asset('storage/' . $animal->image) }}" alt="Image of {{ $animal->name }}" width="300">
        @else
            <p>No image available</p>
        @endif
    </div>

    <br>
    <a href="{{ route('animals.index') }}">Back to Animals List</a>
@endsection