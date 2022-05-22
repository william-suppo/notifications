<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-primary" id="app">
<nav class="flex items-center justify-end py-4 px-4 text-primary bg-secondary-dark">
    @auth
    <notification-counter user="{{ Auth::user()->id }}"></notification-counter>
    <a href="/orders" class="hover:text-green-500 uppercase font-semibold mr-6">
        Commander
    </a>
    <a href="/logout" class="hover:text-green-500 uppercase font-semibold">
        Se déconnecter
    </a>
    @elseguest
        <a href="/login" class="hover:text-green-500 uppercase font-semibold">
            Se connecter
        </a>
    @endauth
</nav>
<div>
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
