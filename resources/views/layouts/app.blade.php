<!DOCTYPE html>
<html lang="fi">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- This is for ajax post request -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title') - Pics</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- font -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,400italic,700' rel='stylesheet' type='text/css'>
        <!-- own css -->
        <link href="{{{ secure_asset('css/styles.css') }}}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="darker-gray-bg">
        
        <div id="form-login" class="transp-black-bg fixed-full">
            <div class="login-register-wrapper dark-gray-bg light-shadow trans-centered">
                <div class="color-line-pics-login of-hidden"><div></div></div>
                <form class="">
                    <button type="button" id="close-login" class="btn btn-link close-form">X</button>
                    <h3>Kirjaudu sisään</h3>
                    <div class="form-group">
                        <label for="username-login" class="sr-only">Käyttäjätunnus</label>
                        <input type="text" id="username-login" class="form-control button-pics" placeholder="Käyttäjätunnus">    
                    </div>
                    
                    <div class="form-group">
                        <label for="passwd-login" class="sr-only">Salasana</label>
                        <input type="password" id="passwd-login" class="form-control button-pics" placeholder="Salasana">  
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-default button-pics c1-bg">Kirjaudu sisään</button><button type="button" class="btn btn-link">Rekisteröidy</button>    
                    </div>
                </form>
            
            </div>
        </div>
        
        <div id="form-register" class="transp-black-bg fixed-full">
            <div class="login-register-wrapper dark-gray-bg light-shadow trans-centered">
                <div class="color-line-pics-login of-hidden"><div></div></div>
                <form class="">
                    <button type="button" id="close-register" class="btn btn-link close-form">X</button>
                    <h3>Rekisteröidy</h3>
                    <div class="form-group">
                        <label for="username-register" class="sr-only">Käyttäjätunnus</label>
                        <input type="text" id="username-register" class="form-control button-pics" placeholder="Käyttäjätunnus">    
                    </div>
                    
                    <div class="form-group">
                        <label for="passwd-register" class="sr-only">Salasana</label>
                        <input type="password" id="passwd-register" class="form-control button-pics" placeholder="Salasana">  
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-default button-pics c1-bg">Rekisteröidy</button>    
                    </div>
                </form>
            
            </div>
        </div>
    
        <nav id="nav" class="navbar navbar-inverse navbar-static-top nav-pics light-shadow of-hidden">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed navbar-toggle-pics" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">mobiilivalikko</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand nav-logo" href="{{ url('/') }}">
                  <img class="nav-logo-pics" src="{{ url('/') }}/img/logo_white.png" alt="Pics-logo"/>
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-links">
                <li class="{{ Helper::set_nav_active('/') }}"><a href="{{ url('/') }}">Etusivu</a></li>
                <li class="{{ Helper::set_nav_active('image') }}"><a href="{{ url('/image') }}">Kuvat</a></li>  
                <li class="{{ Helper::set_nav_active('info') }}"><a href="{{ url('/info') }}">Tietoa sivusta</a></li>
            
                
            
              </ul>
              
              <ul class="nav navbar-nav navbar-right">

                <div class="login-wrapper">
                    @if (Auth::check())
                       <a class="btn btn-link" href="{{ url('/profile') }}"> Hei, {{ Auth::user()->first_name }}</a> | <a class="btn btn-link" href="{{ url('/logout') }}">Kirjaudu ulos</a>
                    @else
                        <a class="btn btn-link" href="{{ url('/login') }}">Kirjaudu</a> | <a class="btn btn-link" href="{{ url('/register') }}">Rekisteröidy</a>
                    @endif 
                </div>  

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group search-pics">
                        <div>
                            <label for="pics-search" class="sr-only">Haku</label>
                            <input id="pics-search" type="text" class="form-control button-pics" placeholder="Hae...">
                        </div>
                        <button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>    
                    </div>
                </form>
              </ul>
            </div><!-- /.navbar-collapse -->  
          </div><!-- /.container-fluid -->
          <div class="color-line-pics"><div></div></div>    
        </nav> 
        
    @if (!Request::is('/'))    
        <header class="hero-mini of-hidden hero-pics">
            @if (Session::has('message'))
            <div class="flash alert alert-info alert-pics light-shadow">
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif
        </header>    

    @else
        <header id="hero" class="hero of-hidden hero-pics">
            <object class="pics-logo-animation trans-centered" type="image/svg+xml" data="logo_bg_2.svg"></object> 
            @if (Session::has('message'))
                <div class="flash alert alert-info alert-pics light-shadow">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
        </header>
    @endif    

    <main class="light-shadow of-hidden">
        <div class="color-line-pics"><div></div></div>
            <section class="container-fluid container-pics">
                @yield('content')
            </section>
    </main> 
    <div class="of-hidden">
        <div class="color-line-pics"><div></div></div>
    </div>
    
    <footer class="footer darker-gray-bg">
        
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-4">
                    <h3>Pics-kuvapalvelu</h3>
                    <p>email: info@pics.fi</p>
                    <p>puh. 567 456 3564</p>
                </div>
                <div class="col-md-4">
                    <h3>Linkkejä</h3>
                    <p><a href="{{ url('/info') }}">Sivun säännöt</a></p>
                    <p><a href="{{ url('/info') }}">Linkki jonnekin tärkeään paikkaan</a></p>
                </div>
                <div class="col-md-4">
                    <h3>Jotain infoa</h3>
                    <p><a href="#">Jotain täällä</a></p>
                    <p><a href="#">Linkki jonnekin paikkaan</a></p>
                </div>

            </div>
        </div>    
    </footer> 

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{{ secure_asset('js/main.js') }}}" async></script>
    @if (Request::is('/'))
        <script src="{{{ secure_asset('js/index.js') }}}" async></script>
    @endif    
    
    
</body>
</html>
