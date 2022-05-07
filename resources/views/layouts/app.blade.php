<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Uptown</title>
    <link rel="shortcut icon" href="/logo.png'" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,700;1,500;1,600;1,700&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
{{-- <body onload="startTime()"> --}}
<body >
    <audio id="myaudio" controls hidden>
        <source src="{{ asset('audio\sampleaudio.mp3') }}" type="audio/mpeg">
      </audio>

      <input id="orderTakenIconIndicator" type="hidden" value="{{ asset('images\icons\order-taken.png')}}">
      <input id="toserveIconIndicator" type="hidden" value="{{ asset('images\icons\toserveicon.png')}}">
      <input id="completedIconIndicator" type="hidden" value="{{ asset('images\icons\success.png')}}">

    <div id="app">
        <input type="hidden" id="timericon" value="{{ asset('images\icons\timelimit.png') }}">
        {{-- <nav class=" navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="/settings/{{ Auth::user()->id }}">User Account</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <style>

                            </style>

                        @endguest
                    </ul>
                </div>

            </div>
        </nav> --}}
        <!-- <div id="txt"></div> -->

        <li class="notifContainer">
            <div id="notif">
                      {{-- warning message --}}
            <div class="warningMessagage notificationContainer d-none ">
                <div class="messageIcon" >
                    <img  src="{{ asset('images\icons\warning.png') }}" alt="icon">
                </div>
                <div class="messageTex">
                    <p class="mainText">Warning on <span class="tableName">Table 1</span> at <span class="timeText">10:00am</span></p>
                    <p class="eventText">30:00 minutes left on unli package</p>
                </div>
                <a href="" class="btn notifclosebtn"><img src="{{ asset('images\icons\close.png') }}" alt="icon"></a>
            </div>
            {{-- information message --}}
            <div class="informationMessagage notificationContainer d-none">
                <div class="messageIcon" >
                    <img  src="{{ asset('images\icons\information.png') }}" alt="icon">
                </div>
                <div class="messageTex">
                    <p class="mainText"></p>
                    <p class="eventText"></p>
                </div>
                <a href="" class="btn notifclosebtn"><img src="{{ asset('images\icons\close.png') }}" alt="icon"></a>
            </div>
            {{-- success message --}}

            <div class="successMessagage notificationContainer d-none">
                <div class="messageIcon" >
                    <img  src="{{ asset('images\icons\success.png') }}" alt="icon">
                </div>
                <div class="messageTex">
                    <p class="mainText "id="mainText">Order has been added on Table <span class="tableName " id="NotifTable"></span> at <span class="timeText NotifTime"></span></p>
                    <p class="eventText"><span class="NotifMenu"></span> added to cart</p>
                </div>
                <a href="" class="btn notifclosebtn"><img src="{{ asset('images\icons\close.png') }}" alt="icon"></a>
            </div>

            </div>
        </li>
        @if(Auth::user()->role_id === 2)
        {{-- <div class="navbar-expand-lg navbar-light bg-light">
            @if(Auth::user()->role_id === 1)
            <a class="logoContainer" href="{{ url('/admin') }}"><img class="logo" src="{{ asset('images\icons\logo.png') }}" alt="icon"></a>
            @elseif(Auth::user()->role_id === 2)
            <a class="logoContainer" href="{{ url('/cashier') }}"><img class="logo" src="{{ asset('images\icons\logo.png') }}" alt="icon"></a>
            @elseif(Auth::user()->role_id === 3)
            <a class="logoContainer" href="{{ url('/waiter') }}"><img class="logo" src="{{ asset('images\icons\logo.png') }}" alt="icon"></a>
            @elseif(Auth::user()->role_id === 4)
            <a class="logoContainer" href="{{ url('/kitchen') }}"><img class="logo" src="{{ asset('images\icons\logo.png') }}" alt="icon"></a>
            @endif
            <a class="dropdown-item" href="/settings/{{ Auth::user()->id }}">User Account</a>
            <div class="navContainer">
                    <a class="logOutBtn" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <div class="text-center">
                            <img class="mr-1" src="{{ asset('images\icons\logout.png') }}" alt="icon">
                            <p class="text-white"> {{ __('Logout') }}</p>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
        </div> --}}
        <nav class="main-navBar  navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top px-5 ">
                {{-- <a class="navbar-brand" href="#">
                    <img class="logo" src="{{ asset('images\logo1.png') }}" alt="">
                </a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class="user-img" src="{{ Auth::user()->image }}" alt="">
                                    <div class="user-info">
                                        <p class="user-name">{{ Auth::user()->name }}</p>
                                        <p class="user-role">Cashier</p>
                                    </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>

                            </li>
                            <style>

                            </style>

                        @endguest
                    </ul>
                </div>

        </nav>
        @elseif(Auth::user()->role_id === 3 || Auth::user()->role_id === 4)
         <nav class=" navbar navbar-expand-lg  navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                {{-- <a class="navbar-brand" href="#">
                    <img class="logo" src="{{ asset('images\logo1.png') }}" alt="">
                </a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="/settings/{{ Auth::user()->id }}">User Account</a>
                                </div>
                            </li>
                            <style>

                            </style>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @endif
        <main class=" canvas mt-5 ">
            @yield('content')
        </main>

        {{-- icon values --}}
        {{-- <input id="timerStarticon" type="hidden" value="{{ asset('images\icons\timelimit.png') }}"/>
        <input id="orderTaken" type="hidden" value="{{ asset('images\icons\order-taken.png') }}"/>
        <input id="orderComplete" type="hidden" value="{{ asset('images\icons\toserveicon.png') }}"/> --}}
    </div>
    <script src="./js/app.js"></script>

    <script >

            Echo.channel('disablemenuEvent')
              .listen('.disablemenuEvent', (e)=>{
                console.log(e.menuitem);
                $('.informationMessagage').removeClass('d-none')
                $('.mainText').text(e.menuname+" has been disabled!");
                $('.eventText').text("Please notify customers of any affected orders!");
                notif()
              });

          $('#notif').hide();
            function notif(){
                $("#notif").show().delay(3000).fadeOut();
             }

          function success(tablename,menu){
            $('.successMessagage').removeClass('d-none');
            $('#NotifTable').html(tablename);
            $('.NotifTime').html(new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}));
            $('.NotifMenu').html(menu);
            var text='Order has been added on Table ';
            $('#mainText').html(text);
            $("#notif").show().delay(3000).fadeOut();
          }

          function ticketSuccess(tablename){
            $('.successMessagage').removeClass('d-none');
            var text='Ticket has been made on Table ';
            $('#mainText').html(text);
            $('#NotifTable').html(tablename);
            $('.NotifTime').html(new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}));
            $("#notif").show().delay(2000).fadeOut();
          }



    </script>
</body>
</html>
