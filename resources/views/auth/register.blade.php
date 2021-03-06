@extends('layouts.app')

@section('title', 'Rekisteröidy')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-default list-pics login-wrapper">
                <div class="panel-heading"><h2>Rekisteröidy</h2></div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'post', 'url' => url('/auth/register'), 'role' => 'form']) !!}
                    
                        {!! csrf_field() !!}

                        <div class="form-group form-group-pics{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            {!! Form::label('first_name', 'Etunimi', ['class' => 'sr-only']) !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control button-pics', 
                                                                 'placeholder' => 'Etunimi', 
                                                                 'value'=> old('first_name') ]) 
                            !!}
                            
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                        </div>                        
                        
                        <div class="form-group form-group-pics{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            {!! Form::label('last_name', 'Sukunimi', ['class' => 'sr-only']) !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control button-pics', 
                                                                 'placeholder' => 'Sukunimi', 
                                                                 'value'=> old('last_name') ]) 
                            !!}
                            
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                        </div> 
                        
                        <div class="form-group form-group-pics{{ $errors->has('username') ? ' has-error' : '' }}">
                            {!! Form::label('username', 'Käyttäjätunnus', ['class' => 'sr-only']) !!}
                            {!! Form::text('username', null, ['class' => 'form-control button-pics', 
                                                                 'placeholder' => 'Käyttäjätunnus', 
                                                                 'value'=> old('username') ]) 
                            !!}
                            
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group form-group-pics{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Sähköposti', ['class' => 'sr-only']) !!}
                            {!! Form::email('email', null, ['class' => 'form-control button-pics', 
                                                                 'placeholder' => 'Sähköposti', 
                                                                 'value'=> old('email') ]) 
                            !!}
                            
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group form-group-pics{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Salasana', ['class' => 'sr-only']) !!}
                            {!! Form::password('password', ['class' => 'form-control button-pics', 
                                                                 'placeholder' => 'Salasana', 
                                                                 'value'=> old('password') ]) 
                            !!}
                            
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group form-group-pics{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('password_confirmation', 'Salasana uudelleen', ['class' => 'sr-only']) !!}
                            {!! Form::password('password_confirmation', ['class' => 'form-control button-pics', 
                                                                 'placeholder' => 'Salasana uudelleen', 
                                                                 'value'=> old('password_confirmation') ]) 
                            !!}
                            
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Rekisteröidy', ['class' => 'btn btn-default button-pics send-pics']) !!}
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
