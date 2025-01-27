@extends('layouts.layout')

@section('title', 'Animals')

@section('content')
    <h1>All Animals</h1>

    <div>
        @foreach($animals as $animal)
            <div style="margin-bottom: 20px;">
                <h2>{{ $animal->name }}</h2>
                @if($animal->image)
                    <img src="{{ asset('storage/' . $animal->image) }}" alt="Image of {{ $animal->name }}" width="150">
                @else
                    <p>No image available</p>
                @endif
                <p><strong>Species:</strong> {{ $animal->species->name }}</p>
                <p><strong>Breed:</strong> {{ $animal->breed->name }}</p>
                <a href="{{ route('animals.show', $animal->id) }}">View Details</a>
            </div>
        @endforeach
    </div>
@endsection