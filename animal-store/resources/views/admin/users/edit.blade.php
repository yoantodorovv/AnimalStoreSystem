@extends('layouts.layout')

@section('title', 'Edit User')

@section('content')
<h1>Edit User</h1>
<form action="{{ url('/admin/users/' . $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">User Name:</label>
    <input type="text" name="name" id="name" value="{{ $user->name }}" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ $user->email }}" required>

    <label for="role">Role:</label>
    <select name="role" id="role">
        <option value="viewer" {{ $user->role == 'viewer' ? 'selected' : '' }}>Viewer</option>
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
    </select>

    <button type="submit">Update User</button>
</form>
@endsection
