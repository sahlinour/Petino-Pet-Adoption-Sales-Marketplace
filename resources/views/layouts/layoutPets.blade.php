<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pets')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS global -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- CSS spécifique Pets -->
    <link rel="stylesheet" href="{{ asset('css/stylePets.css') }}">

    @yield('styles')
</head>
<body>

    {{-- Navbar (réutilisée depuis Home) --}}
    @include('partials.navbar')

    {{-- Contenu principal --}}
    <main class="pets-main">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    @yield('scripts')
</body>
</html>
