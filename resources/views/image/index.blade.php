@extends('layouts.app')
 
@section('content')
    
    <h2>Kaikki kuvat</h2>
 
    @if ( !$images->count() )
        Kuvia ei löytynyt :(
    @else
        <ul>
            @foreach( $images as $image )
                
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-pics of-hidden">
                    <div class="img-wrapper-pics">
                        
                        
                        <!--<img src="{{ URL::asset($image->url) }}" class="landscape trans-centered"/>-->                        
                        <img src="{{ URL::asset('img/lift1.jpg') }}" class="landscape trans-centered"/>
                        <div class="img-info button-pics">
                            <i class="fa fa-download"></i> 54 <!-- tähän latausmäärä -->
                            <i class="fa fa-comments"></i> 4 <!-- tähän kommenttien määrä -->
        
                        </div>
                    </div>    
                </div>
            @endforeach
        </ul>
    @endif
    
    
@endsection