<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="nav">
            <ul>
                <li><a href="{{ url('/') }}" class="nav-btn">Home</a></li>
            </ul>

            <div>
                <img src="{{ asset('/favicon.png') }}" class="logo" />
            </div>

            <ul>
                @if (Route::has('login'))
                    @auth
                        @if (auth()->user()->isAdmin())
                            <li><a href="{{ url('admin/') }}" class="nav-btn">Admin</a></li>
                        @endif
                        @if (Route::has('logout'))
                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="nav-btn">
                                        Logout
                                    </button>
                                </form>
                            </li>   
                        @endif
                    @else
                        <li><a href="{{ route('login') }}" class="nav-btn">Log in</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="nav-btn">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; {{ date('Y') }} My Laravel App. All rights reserved.</p>
    </footer>
</body>
</html>
