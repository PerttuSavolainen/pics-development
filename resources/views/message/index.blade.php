@extends('layouts.app')
 
@section('content')

    @if ( !$messages->count() )
        <p>Viestejä ei löytynyt :(</p>
    @else
        @foreach( $messages as $message )
            <h5>{!! $message->user_id !!}</h5>
            <p>{!! $message->content !!}</p>  
        @endforeach    
    @endif                

@endsection