<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="fr">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" href="{{ Storage::url('assets/img/login-logo-aliexpress.b04df2eb.png') }}" type="image/png">

        <!-- Scripts -->
    @vite(['resources/css/machines.css','resources/css/prime.css','resources/css/parametres.css','resources/css/modal.css','resources/css/recharger.css','resources/css/dashboard.css','resources/css/footer.css', 'resources/js/app.js','resources/js/modal.js'])
</head>
<body>
    <div class="wrapper">

     {{ $slot }}

    </div>
    <footer>
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <img src="{{ Storage::url('assets/img/shouye-active.png') }}" alt="">
            </a>
        </li>
        <li>
            <a href="/investissement" class="{{ request()->routeIs('recharger') ? 'active' : '' }}">
                <img src="{{ Storage::url('assets/img/recharge.png') }}" alt="">
            </a>
        </li>
        <li>
            <a href="/parrainage" class="{{ request()->routeIs('machines')}}">
                <img src="{{ Storage::url('assets/img/gouwudai.png') }}" alt="">
            </a>
        </li>
        <li>
            <a href="{{ route('machines') }}" class="{{ request()->routeIs('taches') ? 'active' : '' }}">
                <img src="{{ Storage::url('assets/img/cunqianguan.png') }}" alt="">
            </a>
        </li>
        <li>
            <a href="{{ route('parametres') }}" class="{{ request()->routeIs('parametres') ? 'active' : '' }}">
                <img src="{{ Storage::url('assets/img/mingpian.png') }}" alt="">
            </a>
        </li>
    </ul>
</footer>



</body>
</html>
