@extends('layouts.layout')

@section('title', 'Breeds | Edit')

@section('content')
    <h1>Edit Breed</h1>
    <form action="{{ route('admin.breeds.update', $breed) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $breed->name }}" required>
        <button type="submit">Update</button>
    </form>
@endsection