<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .pink-gradient {
            background: linear-gradient(135deg, #fbcfe8 0%, #db2777 100%);
        }

        .text-shadow {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="class=bg-pink-50 font-sans">
    {{ $slot }}
</body>

</html>