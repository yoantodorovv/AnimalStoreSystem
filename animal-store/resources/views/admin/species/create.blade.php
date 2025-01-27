@extends('layouts.layout')

@section('title', 'Species | Create')

@section('content')
    <h1>Create Species</h1>
    <form action="{{ route('admin.species.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Save</button>
    </form>
@endsection