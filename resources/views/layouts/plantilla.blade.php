<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
       
   

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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a href="{{url('/')}}" style="margin-rigth: 8px;" class="navbar-brand">logo</a>
            
                @yield('nav')
                
            <ul id="nav-mobile" class="ml-auto btn-group" role="group">
                @guest
                            <li class="nav-item active">
                                <a class="nav-link btn btn-warning" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary" href="{{ route('register') }}">{{ __('Unete como vendedor') }}</a>
                                </li>
                            @endif
                        @else
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                            
                        <li class="nav-item dropdown">
                            <button class="nav-link dropdown-toggle btn-success" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('cerrar sesion') }}
                            </a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
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
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                © 2014 Copyright Text
                <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>

<!-------------------------------------------------------------------------------->
<script src="{{asset('js/app.js')}}"></script>    
@yield('scripts')
    
    </body>
</html>