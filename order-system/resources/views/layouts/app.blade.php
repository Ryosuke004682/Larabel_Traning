<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <header>
        <div class="container">
            <a class="brand" href="/">{{ config('app.name') }}</a>
            <ul class="navigation">
                <li><a href="{{ route('products.index') }}">商品管理</a></li>
                <li><a href="{{ route('customers.index') }}">顧客管理</a></li>
                <li><a href="{{ route('orders.index') }}">注文管理</a></li>                
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

</body>
</html>