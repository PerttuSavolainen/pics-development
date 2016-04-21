@extends('layouts.app')

@section('title', 'Etusivu')

@section('content')

    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="col-pics">
                <h2>Tervetuloa Pics-valokuvapalveluun</h2>
                <p>
                    Palvelussamme voit selata, hakea ja julkaista kuvia sekä kommentoida niitä. 
                    Rekisteröidy palveluumme kommentoidaksesi ja jakaaksesi kuvia.
                </p>
                
                    <a href="{{ url('/register') }}"><h4>Rekisteröidy tästä!</h4></a>
                </p>
            </div> 
            
            <a href="{{ url('/index.php/image/create') }}"><h4 class="btn btn-default">Lähetä kuva</h4></a>
            
        </div>    
        <div  class="col-md-8 col-lg-9 col-pics of-hidden">
            
            <div id="ajaxImageWrapper" class="row">
                <!-- images will be here via ajax call -->
            </div> 
            <button id="loadMoreImages" class="btn btn-default button-pics col-md-push-4 col-md-4 c1-bg btn-margin">Lataa lisää...</button>
        </div>
        
    </div>    
         
@endsection