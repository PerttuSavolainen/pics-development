@extends('layouts.app')

@section('title', 'Kuvat')
 
@section('content')

    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="col-pics">
                
                 {!! Form::open(['method' => 'get', 'url' => 'image', 'role' => 'search']) !!}
                    <h2>Kuvat</h2>

                    <div class="form-group search-pics">
                        <div>
            
                            {!! Form::label('pics-search', 'Hakusanat', ['class' => 'sr-only']) !!}
                            {!! Form::text('pics-search', null, ['class' => 'form-control button-pics', 'placeholder' => 'Hakusanat']) !!}
                            
                        </div>
                        <button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
                    </div>
                {!! Form::close() !!}
                
                
                
            </div> 
            
            
        </div>    
        <div  class="col-md-8 col-lg-9 col-pics of-hidden">
        
        @if ( !$images->count() )
            <p>Kuvia ei löytynyt :(</p>
        @else
            @foreach( $images as $image )
                <a href="{{ route('image.show', $image->id) }}">
                    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-pics of-hidden">
                        <div class="img-wrapper-pics">
                            <img src="{{ URL::asset($image->image_url) }}" class="landscape trans-centered"/>
                            <div class="img-info button-pics">
                                <i class="fa fa-download"></i> {!! $image->download_count !!} <!-- tähän latausmäärä -->
                                <i class="fa fa-comments"></i><!-- tämä kesken!! {!!$image->messages !!} <!-- tähän kommenttien määrä -->
                            </div>
                        </div>    
                    </div>
                </a>    
            @endforeach    
        @endif                
            
        </div>
        
    </div>    

@endsection