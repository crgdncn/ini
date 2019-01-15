<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
        <script src="{{mix('/js/app.js')}}"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="token" content="{{csrf_token()}}">
    </head>
    <body>
        <div class="sidenav">
            <a id="nav-home" href="{{route('home')}}">Home</a>
            <a id="nav-define" href="{{route('ini.types.index')}}">Define</a>
            <a id="nav-create" href="{{route('files.file.index')}}">Create</a>
        </div>
        <div class="main">
            @yield('content')
        </div>
        <!-- Modal -->
        <div class="modal fade" id="iniModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header th-color">
                        <button id="modal-dismiss-button" type="button" class="close" style="font-size: 2.5em;" data-dismiss="modal">
                            &times;
                        </button>
                        <h4 id="modal-header" class="modal-title">INI File Management</h4>
                    </div>
                <div id="modal-body" class="modal-body">
                    <p>INI Modal Body</p>
                </div>
                <!-- div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div -->
              </div>
            </div>
        </div>
        <!-- End Modal -->
    </body>
</html>
