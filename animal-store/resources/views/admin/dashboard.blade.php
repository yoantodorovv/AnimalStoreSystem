@extends('layouts.layout')

@section('title', 'Admin | Dashboard')

@section('content')
<h1>Welcome to the Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="{{ url('/admin/animals/') }}">Manage Animals</a></li>
            <li><a href="{{ url('/admin/breeds/') }}">Manage Breeds</a></li>
            <li><a href="{{ url('/admin/species/') }}">Manage Species</a></li>
            <li><a href="{{ url('/admin/users/') }}">Manage Users</a></li>
        </ul>
    </nav>
@endsection