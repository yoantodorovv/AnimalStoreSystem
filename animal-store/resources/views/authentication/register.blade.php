@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <h1>Register</h1>

    <form action="{{ route('register') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')<div>{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')<div>{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password')<div>{{ $message }}</div>@enderror
    </div>
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>
    <button type="submit">Register</button>
</form>

@endsection