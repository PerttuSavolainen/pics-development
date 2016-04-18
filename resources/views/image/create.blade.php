@extends('layouts.app')
 
@section('content')
    
    <main class="light-shadow of-hidden">
        <div class="color-line-pics"><div></div></div>
        <section class="container-fluid container-pics">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="col-pics">
                        
                        
                        {!! Form::model(new App\Image, ['route' => ['image.store'], 'files'=>true]) !!}
                            @include('image/partials/_upload_form')
                        {!! Form::close() !!}

                    </div> 
                </div>    
                <div  class="col-md-8 col-lg-9 col-pics of-hidden">
                    
                </div>
                
            </div>    
        </section>
    </main>
    
    
    
    
@endsection