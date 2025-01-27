@extends('layouts.layout')

@section('title', 'Species')

@section('content')
    <h1>Manage Species</h1>
    <a href="{{ route('admin.species.create') }}">Add New Specie</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($species as $specie)
                <tr>
                    <td>{{ $specie->name }}</td>
                    <td>
                        <a href="{{ route('admin.species.edit', $specie) }}">Edit</a>
                        <form action="{{ route('admin.species.delete', $specie) }}" method="POST" style="display:inline;">
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