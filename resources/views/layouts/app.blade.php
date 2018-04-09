
<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>Sellads</title>
        <link rel="stylesheet" href='/css/app.css' type="text/css"> 
    </head>
    <body>
        @include('inc.menu')
            @yield('content')
        @include('inc.footer')
    </body>
</html>
