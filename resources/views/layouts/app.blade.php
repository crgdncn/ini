<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta id="token" name="csrf-token" content="{{csrf_token()}}">
    </head>
    <body>
        <div class="topnav">

            <ul>
                <li><a id="nav-home"   class="{{ ($urlSegment == '' )     ? 'nav-active':''}}" href="{{relativeRoute('home')}}">Home</a></li>
                <li><a id="nav-define" class="{{ ($urlSegment == 'ini')   ? 'nav-active':''}}" href="{{relativeRoute('ini.types.index')}}">Define</a></li>
                <li><a id="nav-create" class="{{( $urlSegment == 'files') ? 'nav-active':''}}" href="{{relativeRoute('files.file.index')}}">Create</a></li>
            </ul>
        </div>
        <div class="main">
            @yield('content')
        </div>
        {{-- Modal --}}
        <div class="modal fade" id="iniModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header th-color">
                        <div class="mr-auto">
                            <h4 id="modal-header" class="modal-title">INI File Management</h4>
                        </div>
                        <div class="ml-auto">
                            <button id="modal-dismiss-button" type="button" class="close" style="font-size: 1.5em;" data-dismiss="modal">
                                &times;
                            </button>
                        </div>
                    </div>
                    <div id="modal-body" class="modal-body">
                        <p>INI Modal Body</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal --}}

        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="{{mix('/js/app.js')}}"></script>
    </body>
</html>
