<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/ts/app.ts'])
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="bg-primary text-white p-2 w-100 d-flex align-items-center justify-content-between fixed-top">
        <button class="btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">☰</button>
        <h1 class="m-0">My Application</h1>
    </header>
    <div class="d-flex flex-grow-1" style="margin-top: 70px;">
        <aside class="bg-light p-3 border-end collapse d-lg-block" id="sidebar" style="width: 250px;">
            <nav>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-decoration-none d-block py-2 px-3">Home</a></li>
                    <li><a href="/about" class="text-decoration-none d-block py-2 px-3">About</a></li>
                    <li><a href="/contact" class="text-decoration-none d-block py-2 px-3">Contact</a></li>
                </ul>
            </nav>
        </aside>
        <main class="p-4 flex-grow-1">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
