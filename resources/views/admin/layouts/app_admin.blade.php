<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        @include('admin.layouts.header_admin')
        @include('admin.layouts.side_bar_admin')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="py-2 d-flex justify-content-between">
                @yield('title')
            </h2>
            @yield('content')
        </main>
    </div>
    </div>

    </main>
    </div>
</body>

</html>
