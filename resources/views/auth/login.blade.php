@extends('layouts.app')

@section('title', 'Kirjaudu sisään')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-default list-pics login-wrapper">
                <div class="panel-heading"><h2>Kirjaudu sisään</h2></div>
                <div class="panel-body">
                    {!! Form::open(['method' => 'post', 'url' => url('/auth/login'), 'role' => 'form']) !!}    
                        {!! csrf_field() !!}

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

                        <div class="form-group">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Muista minut
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::submit('Kirjaudu sisään', ['class' => 'btn btn-default button-pics']) !!}
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Unohditko salasanasi?</a>
                        </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
