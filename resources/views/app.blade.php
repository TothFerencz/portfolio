<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Toth Ferencz')</title>
    @vite('resources/scss/app.scss')
</head>

<body>
    <!-- Navbar beimportálása -->
    @include('components.navbar')

    <!-- Fő tartalom -->
    <div style="margin-bottom: 80px;">
        @yield('content')
    </div>

    <!-- Footer beimportálása -->
    @include('components.footer')

    <!-- Itt szerepelhetnek a JavaScript fájlok -->
</body>

</html>
