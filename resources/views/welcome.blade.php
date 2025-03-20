<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>TOP-TEST</title>
    @vite(['resources/css/app.css', 'resources/ts/app.ts'])
</head>
<body class="d-flex flex-column min-vh-100">
    <x-score-board name="isamu" my-age="30"></x-score-board>
    @yield('scripts')
</body>
</html>

