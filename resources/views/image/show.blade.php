@extends('layouts.app')
 
@section('title', 'Kuvasivu') 
 
@section('content')

    <div class="row">
        @if (Auth::check())
            <div class="col-md-2 col-pics light-shadow profile-list-pics lighter-gray-bg">
                <div class="list-group">
                    <div class="list-group-item list-pics"><h3>Profiili</h3></div>
                    <div class="list-group-item list-pics">
                        <a href="{{ url('/image/create') }}"><h4>Lähetä kuva</h4></a>
                    </div>
                    <div class="list-group-item list-pics">
                        <a href="{{ url('/image/create') }}"><h4>Omat kuvat</h4></a>
                    </div>
                    
                </div>    
            </div>
            <div class="col-md-7">
        @else
            <div class="col-md-9">
        @endif 
            <div class="img-show-preview">
            @if (!$image)
                <p>Kuvaa ei löytynyt :(</p>
            @else
                <div class="img-show-wrapper">
                    <img src="{{ URL::asset($image->image_url) }}" class="landscape img-responsive"/>
                    <div class="img-details">
                        <p style="position: absolute; left: 0;">Lähettäjä: <span class="message-sender">{!! User::getUsername($image->user_id) !!}</span></p>
                        <p style="position: absolute; right: 0;">    
                            <i class="fa fa-download"></i> {!! $image->download_count !!} /
                            <i class="fa fa-comments"></i> {!! $messages->count() !!}
                        </p>
                    </div>
                </div>
            @endif
            </div>
        </div>    
       
        <div class="col-md-3 col-pics light-shadow">
            <div class="message-field-pics">
                <div class="list-group">
                    <div class="list-group-item list-pics">
                        <h3>Viestit</h3>
                    </div>
                    
                    @if (Auth::check())
                        <div class="list-group-item list-pics">
                            {!! Form::model(new App\Message, ['route' => ['image.message.store', $image], 'files'=>true]) !!}
                                @include('image/partials/_send_message_form')
                            {!! Form::close() !!}
                        </div>    
                    @endif
                    
                    @if ( !$messages->count() )
                        <div class="list-group-item list-pics">
                            <p>Viestejä ei löytynyt...</p>
                        </div>    
                    @else
                        @foreach( $messages as $message )
                            <div class="list-group-item list-pics">
                                <p class="message-pics"><span class="message-sender">{!! User::getUsername($message->user_id) !!}: </span>
                                {!! $message->content !!}</p>
                                <p class="message-pics message-time">{!! $message->created_at !!}</p>
                            </div>
                        @endforeach    
                    @endif 
                    
                </div>
            </div>    
        </div>
        
    </div>

    

@endsection