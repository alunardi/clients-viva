<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Clientes - Viva Eventos</title>

        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
              rel="stylesheet">
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
              crossorigin="anonymous">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="item item-1 background-black"></div>
        <div class="item item-2 background-black">
            <div class="text-center">
                <h3>Clientes - Viva Eventos</h3>
            </div>
        </div>
        <div class="item item-3 background-black"></div>
        <div class="item item-4"></div>
        <div class="item item-5">
            @yield('content')
        </div>
        <div class="item item-6"></div>
        <div class="item item-7 background-black"></div>
        <div class="item item-8 background-black"></div>
        <div class="item item-9 background-black">
            <div class="text-right">
                <h6>Alexandre Lunardi</h6>
            </div>
        </div>
    </body>
</html>
