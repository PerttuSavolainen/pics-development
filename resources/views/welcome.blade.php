@extends('layouts.app')

@section('title', 'Etusivu')

@section('content')

    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="col-pics-padding">
                <!--<h2>Pics</h2>-->
                <object class="logo-index" type="image/svg+xml" data="logo_white.svg"></object>
                <h4 class="c1-color">...or didn't happen.</h4>
                <p>
                    Tervetuloa Pics-valokuvapalveluun. Palvelussamme voit selata, hakea ja julkaista kuvia sekä kommentoida niitä. 
                    Rekisteröidy palveluumme kommentoidaksesi ja jakaaksesi kuvia.
                </p>
                @if (Auth::check())
                    <div class="list-group">
                        <div class="list-group-item list-pics"><h3>Profiili</h3></div>
                        <div class="list-group-item list-pics">
                            <a href="{{ url('/image/create') }}"><h4 class="link-pics">Lähetä kuva</h4></a>
                        </div>
                        <div class="list-group-item list-pics">
                            <a href="{{ url('/image/create') }}"><h4 class="link-pics">Omat kuvat</h4></a>
                        </div>
                    </div>
                @else
                    <a class="link-pics" href="{{ url('/register') }}"><h4 class="link-pics">Rekisteröidy tästä!</h4></a>
                @endif
                </p>
            </div> 
            
            
            
        </div>    
        <div  class="col-md-8 col-lg-9 col-pics of-hidden">
            
            <div id="ajaxImageWrapper" class="row">
                <!-- images will be here via ajax call -->
            </div> 
            <button id="loadMoreImages" class="btn btn-default button-pics col-xs-push-3 col-xs-6 col-md-push-4 col-md-4 c1-bg btn-margin">Lataa lisää...</button>
        </div>
        
    </div>    
         
@endsection