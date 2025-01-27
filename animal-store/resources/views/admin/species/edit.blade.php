@extends('layouts.layout')

@section('title', 'Species | Edit')

@section('content')
    <h1>Edit Species</h1>
    <form action="{{ route('admin.species.update', $specie) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $specie->name }}" required>
        <button type="submit">Update</button>
    </form>
@endsection