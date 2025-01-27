@extends('layouts.layout')

@section('title', 'Users')

@section('content')
    <h1>Manage Users</h1>
    <a href="{{ route('admin.users.create') }}">Add New User</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}">Edit</a>
                        <form action="{{ route('admin.users.delete', $user) }}" method="POST" style="display:inline;">
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