<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Service Portal Title -->
    <title>{{config('settings.site_title')}}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{config('settings.site_name')}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @canany(['create-customer', 'edit-customer', 'delete-customer'])
                                <li><a href="{{route('customers.index')}}" class="nav-link">Customers</a></li>
                            @endcanany
                            @canany(['create-machine','edit-machine','delete-machine'])
                                <li><a href="{{route('machine.index')}}" class="nav-link">Machines</a></li>
                            @endcanany
                            @canany(['create-jobs','edit-jobs','delete-jobs'])
                                <li><a href="{{route('jobs.index')}}" class="nav-link">Jobs</a></li>
                            @endcanany
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @canany(['create-user','edit-user','delete-user','create-role','edit-role','delete-role','edit-setting'])
                                <li class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="adminDropdown">Configuration</a>
                                    <div class="dropdown-menu" aria-labelledby="adminDropdown">
                                        {{-- Job Statuses --}}
                                        @canany(['create-jobstatus','edit-jobstatus','delete-jobstatus'])
                                            <a href="{{route('jobstatus.index')}}" class="dropdown-item">Manage Job Statuses</a>
                                        @endcanany

                                        {{-- Job Types --}}
                                        @canany(['create-jobtype','edit-jobtype','delete-jobtype'])
                                            <a href="{{route('jobtype.index')}}" class="dropdown-item">Manage Job Types</a>
                                        @endcanany

                                        <hr class="dropdown-divider">
                                        <!-- User Accounts -->
                                        @canany(['create-user','edit-user','delete-user'])
                                            <a href="{{route('users.index')}}" class="dropdown-item">Manage Users</a>
                                        @endcanany

                                        <hr class="dropdown-divider">
                                        <!-- Roles & Permissions -->
                                        @canany(['create-role','edit-role','delete-role'])
                                            <a href="{{route('roles.index')}}" class="dropdown-item">Manage Roles</a>
                                        @endcanany

                                        <!-- Global Settings -->
                                        @canany(['edit-settings'])
                                            <a href="{{route('settings.index')}}" class="dropdown-item">Manage Settings</a>
                                        @endcanany


                                    </div>
                                </li>
                            @endcanany

                            <li class="nav-item dropdown">
                                <a href="#" id="usersDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    My Account
                                </a>

                                <div class="dropdown-menu dropdown-menu" aria-labelledby="usersDropdown">
                                    <a href="{{route('profile.index')}}" class="dropdown-item">My Profile</a>
                                    <hr class="dropdown-divider">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center alert-dismissible" role="alert">
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                                <h4 class="alert-heading">Success!</h4>
                                <p class="mb-0">{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('warning'))
                            <div class="alert alert-warning text-center alert-dismissible" role="alert">
                                <button class="btn-close" data-bs-dismiss="alert"></button>
                                <h4 class="alert-heading">Warning!</h4>
                                <p class="mb-0">{{ $message }}</p>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    @yield('endscript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
