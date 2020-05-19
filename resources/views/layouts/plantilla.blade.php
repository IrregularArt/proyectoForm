<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titulo')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/materialize.min.css')}}">
        <script src="{{asset('js/materialize.min.js')}}"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
        <nav>
        <div class="row">
            <div class="nav-wrapper">
                @yield('nav')
                <a href="{{url('/')}}" style="margin-rigth: 8px;" class="brand-logo left">logo</a>
            <ul id="nav-mobile" class="right push-4 hide-on-med-and-down">
                @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Unete como vendedor') }}</a>
                                </li>
                            @endif
                        @else
                        <ul id="dropdown1" class="dropdown-content">
                            <li><i class="material-icons prefix">arrow_back</i></li>
                            <div class="divider"></div>
                            <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('cerrar sesion') }}
                             </a></li>
                          </ul>
                            <li class="nav-item dropdown">
                                <a class='dropdown-trigger' href='#' data-target='dropdown1'>{{ Auth::user()->name }} <span class="caret"></span></a>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                            </li>
                        @endguest
               
            </ul>
            </div>
        </div>
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
@yield('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var option = {alignment : 'right'};
    var instances = M.Dropdown.init(elems, option);
  });
</script>
    </body>
</html>