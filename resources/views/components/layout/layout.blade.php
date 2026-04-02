<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'My App' }}</title>        
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
</head>

<body>
    <x-layout.navbar />

    <main>
        {{ $slot }}
    </main>

    <x-layout.footer />

 @stack('scripts')   
</body>

</html>
