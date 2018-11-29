<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">

    <!-- START NAV -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container is-fluid">
            <div class="navbar-brand">
                <span class="navbar-item">
                    <font-awesome-icon icon="bug" class="has-text-link"></font-awesome-icon> LARA<strong>BUG</strong>
                </span>
            
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>
            
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('dashboard') }}">
                        Overview
                    </a>
                
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Issues
                        </a>
                
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="{{ route('issues.mine') }}">
                                Mine
                            </a>
                            <a class="navbar-item" href="{{ route('issues.index') }}">
                                All
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ route('issues.create') }}">
                                Create new
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Projects
                        </a>
                
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                All
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Milestones
                        </a>
                
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                All
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Settings
                        </a>
                
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                All
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            User
                        </a>
                
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                Profile
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </div>

                </div>
            
                <div class="navbar-end">
                <div class="navbar-item">
                    <div class="field has-addons">
                        <div class="control">
                            <input class="input" type="text" placeholder="Find an Issue">
                        </div>
                        <div class="control">
                            <a class="button is-link">
                            Search
                            </a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </nav>

        <main class="py-4">

            <div class="container is-fluid">
                <div class="columns">
                    <div class="column is-9">
                        @yield('content')
                    </div>
                    <div class="column is-3">
                        @yield('sidebar')
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
