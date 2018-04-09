<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>Sellads-Admin</title>
        <link rel="stylesheet" href='/css/app.css' type="text/css"> 
    </head>
    <body>
        @include('inc.adminHeader')
        <div id = "adminContainer">
            <div id = "adminLeft">
                @include('inc.adminMenu')
            </div>
            <div id ="adminContent">
                @yield('content')
            </div>
        </div>
    </body>
</html>