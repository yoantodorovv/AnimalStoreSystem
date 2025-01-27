@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        <br>

        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <br>

        <!-- Submit Button -->
        <button type="submit">Login</button>
    </form>
@endsection