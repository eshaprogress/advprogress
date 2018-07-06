<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Advanced Progress</title>
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            <boot-strap-app />
        </div>
        <script>
            window.emailoctopusId = {{config('app.octopus_id')}}
        </script>
        <script src="{{mix('/js/app.js')}}"></script>
    </body>
</html>
