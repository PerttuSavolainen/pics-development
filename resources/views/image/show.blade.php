@extends('layouts.app')
 
@section('content')
    
    
                       @if ( !$image )
                    <p>Kuvaa ei löytynyt :(</p>
                @else
                    
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
                       
                @endif
    
    
@endsection