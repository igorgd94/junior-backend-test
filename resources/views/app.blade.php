<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Inertia App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@inertia
</body>
</html>
