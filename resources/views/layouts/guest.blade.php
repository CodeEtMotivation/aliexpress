<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', '') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ Storage::url('assets/img/login-logo-aliexpress.b04df2eb.png') }}" type="image/png">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
    <div class="wrapper">
        <div class="En">Fr</div>
        <div class="logo"><img src="{{ Storage::url('assets/img/login-logo-aliexpress.b04df2eb.png') }}" alt=""></div>
        {{ $slot }}    
    </div> 
</body>
</html>