<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <header>
        <div class="container">
            <a href="/" class="brand">{{ config('app.name') }}</a>
        </div>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>