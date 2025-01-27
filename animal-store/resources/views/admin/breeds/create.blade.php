@extends('layouts.layout')

@section('title', 'Breeds | Create')

@section('content')
    <h1>Create Breed</h1>
    <form action="{{ route('admin.breeds.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="specie">Specie:</label>
        <input type="text" name="specie" id="specie" required>
        <button type="submit">Save</button>
    </form>
@endsection