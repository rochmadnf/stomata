<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Rochmad Nurul Fahmi" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>{{ $subtitle }} &Colon; {{ env('APP_NAME') }}</title>

    <link rel="shortcut icon" href="https://rochmadnf.my.id/assets/images/favicon.png" type="image/png">

    @vite('resources/css/app.css')
</head>

<body class="antialiased text-gray-900">
    {{ $slot }}
</body>

</html>
