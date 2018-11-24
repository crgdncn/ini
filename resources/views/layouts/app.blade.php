<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
        <script type="javascript" href="{{mix('/js/app.js')}}"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="sidenav">
            <a href="{{route('ini.types.index')}}">Types</a>
            <a href="{{route('ini.sections.all')}}">Sections</a>
            <a href="{route('ini.keys.all')}}">Keys</a>
        </div>
        <div class="main">
            @yield('content')
        </div>
    </body>
</html>
