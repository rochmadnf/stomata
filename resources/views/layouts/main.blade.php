<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Rochmad Nurul Fahmi" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>{{ $subtitle }} &Colon; {{ env('APP_NAME') }}</title>

    <link rel="shortcut icon" href="https://rochmadnf.my.id/assets/images/favicon.png" type="image/png">

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-green-50 text-gray-900 antialiased dark:bg-slate-800 dark:text-gray-50">
    @if ($sidebar)
        @include('layouts.sidebar')
        <div class="p-4 sm:ml-64">
            {{ $slot }}
        </div>
    @else
        <main class="min-h-screen w-full">
            {{ $slot }}
        </main>
    @endif

    {{ $scripts ?? '' }}
</body>

</html>
