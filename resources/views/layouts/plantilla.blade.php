<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
       
   

        <style>
                    body {
                        display: flex;
                        min-height: 100vh;
                        flex-direction: column;
                    }

                    main {
                        flex: 1 0 auto;
                    }
        </style>
        @yield('links')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg " id="navbarprin">
            <a href="{{url('/')}}" style="margin-rigth: 8px; color: white; font-size: 30px;" class="navbar-brand">MARKET PLACE</a>
            
                @yield('nav')
                
            <ul id="nav-mobile" class="ml-auto btn-group" role="group" style="list-style: none;">
                @guest
                            <li class="nav-item active">
                                <a class="nav-link btn btn-success" style="margin-right: 2vw;" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-warning" href="{{ route('register') }}">{{ __('Unete como vendedor') }}</a>
                                </li>
                            @endif
                        @else
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                            
                        <li class="nav-item dropdown">
                            <button class="nav-link dropdown-toggle btn btn-success" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               
                              <a class="dropdown-item" href="/home">Ver mi local</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('cerrar sesion') }}
                                </a>
                            </div>
                          </li>
                            
                        
                            
                        @endguest
               
            </ul>
          
      
        </nav>

<!------------------------------------------------------------------------------>

    <div class="container-fluid">
            @yield('contenido')
    </div>

    <!------------------------------------------------------------------------->
        <footer class="page-footer" style="background-color: darkseagreen;height: 14vh;">
            <div class="row" style="margin-right: 0;">
                <div class="col l4 s12">
                    <h1 class="white-text" style="text-align: center; margin-top: 4vh;">Contactanos:</h1>
                </div>

                <div class="col l2 s6" style="display: inline-flex;">
                    <i><img src="{{asset('img/phone.png')}}" style="width: 40px;margin-top: 5vh;"></i>
                    <h2 class="white-text" style="margin-top: 5vh;">3103457886</h2>
                </div>

                <div class="col l2 s6" style="display: inline-flex;">
                    <i><img src="{{asset('img/facebook.png')}}" style="width: 40px;margin-top: 5vh;"></i>
                    <h2 class="white-text" style="margin-top: 5vh;">MarketIbague</h2>
                </div>

                <div class="col l2 s6" style="display: inline-flex;">
                    <i><img src="{{asset('img/instagram.png')}}" style="width: 40px;margin-top: 5vh;"></i>
                    <h2 class="white-text" style="margin-top: 5vh;">MarketIbague</h2>
                </div>

                <div class="col l2 s6" style="display: inline-flex;">
                    <i><img src="{{asset('img/whatsapp.png')}}" style="width: 40px;margin-top: 5vh;"></i>
                    <h2 class="white-text" style="margin-top: 5vh;">MarketIbague</h2>
                </div>
            </div>
        </footer>

<!-------------------------------------------------------------------------------->
<script src="{{asset('js/app.js')}}"></script>    
@yield('scripts')
    
    </body>
</html>