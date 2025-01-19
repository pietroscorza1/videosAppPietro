<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Videos App' }}</title>
</head>
<body>
<header>
    <h1>{{ $header ?? 'Benvinguts a Videos App' }}</h1>
</header>
<main>
    @yield('content')
</main>
<footer>
    <p>&copy; 2025 Videos App</p>
</footer>
</body>
</html>
