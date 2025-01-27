@extends('layouts.layout')

@section('title', 'Animals')

@section('content')
    <h1>Manage Animals</h1>
    <a href="{{ route('admin.animals.create') }}">Add New Animal</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($animals as $animal)
                <tr>
                    <td>{{ $animal->name }}</td>
                    <td>
                        <a href="{{ route('admin.animals.edit', $animal) }}">Edit</a>
                        <form action="{{ route('admin.animals.delete', $animal) }}" method="POST" style="display:inline;">
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