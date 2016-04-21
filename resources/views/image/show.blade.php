@extends('layouts.app')
 
@section('title', 'Kuvasivu') 
 
@section('content')
    
    @if (!$image)
        <p>Kuvaa ei löytynyt :(</p>
    @else
        
            
        <div class="col-pics of-hidden">
            
            <img src="{{ URL::asset($image->image_url) }}" class="landscape img-responsive"/>
            
                <i class="fa fa-download"></i> {!! $image->download_count !!} <!-- tähän latausmäärä -->
                <i class="fa fa-comments"></i><!-- tämä kesken!! {!!$image->messages !!} <!-- tähän kommenttien määrä -->
            
                
        </div>
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="list-group">
                    @if ( !$messages->count() )
                        <div class="list-group-item list-pics">
                            <p>Viestejä ei löytynyt...</p>
                        </div>    
                    @else
                        @foreach( $messages as $message )
                            <div class="list-group-item list-pics">
                                <h5>{!! User::getUsername($message->user_id) !!}</h5>
                                <p>{!! $message->content !!}</p> 
                            </div>
                        @endforeach    
                    @endif 
                    
                    @if (Auth::check())
                        <div class="list-group-item list-pics">
                            {!! Form::model(new App\Message, ['route' => ['image.message.store', $image], 'files'=>true]) !!}
                                @include('image/partials/_send_message_form')
                            {!! Form::close() !!}
                        </div>    
                    @endif
                </div>
            </div>
        </div>

    @endif

@endsection