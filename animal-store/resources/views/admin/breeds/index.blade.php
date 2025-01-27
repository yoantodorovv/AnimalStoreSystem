@extends('layouts.layout')

@section('title', 'Breeds')

@section('content')
    <h1>Manage Breeds</h1>
    <a href="{{ route('admin.breeds.create') }}">Add New Breed</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($breeds as $breed)
                <tr>
                    <td>{{ $breed->name }}</td>
                    <td>
                        <a href="{{ route('admin.breeds.edit', $breed) }}">Edit</a>
                        <form action="{{ route('admin.breeds.delete', $breed) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection