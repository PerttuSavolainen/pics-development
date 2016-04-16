@extends('layouts.app')
 
@section('content')



    <main class="light-shadow of-hidden">
        <div class="color-line-pics"><div></div></div>
        <section class="container-fluid container-pics">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="col-pics">
                        
                        <form class="">
                            <h2>Kuvat</h2>
                            <div class="form-group">
                                <label for="search-word" class="sr-only">Hakusana</label>
                                <input type="text" id="search-word" class="form-control button-pics" placeholder="Hakusanat...">    
                            </div>
                            
                            <div class="form-group">
                                <!--<label for="passwd-login" class="sr-only">Kategoria</label>
                                <input type="radio" id="passwd-login" class="form-control button-pics" placeholder="Salasana">-->  
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-default button-pics c1-bg">Hae</button>    
                            </div>
                        </form>
                    </div> 
                    
                    
                </div>    
                <div  class="col-md-8 col-lg-9 col-pics of-hidden">
                
                @if ( !$images->count() )
                    <p>Kuvia ei löytynyt :(</p>
                @else
                    @foreach( $images as $image )
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 col-pics of-hidden">
                            <div class="img-wrapper-pics">
                                <img src="{{ URL::asset($image->image_url) }}" class="landscape trans-centered"/>
                                <div class="img-info button-pics">
                                    <i class="fa fa-download"></i> {!! $image->download_count !!} <!-- tähän latausmäärä -->
                                    <i class="fa fa-comments"></i><!-- tämä kesken!! {!! $image->messages->count() !!} <!-- tähän kommenttien määrä -->
                                </div>
                            </div>    
                        </div>
                    @endforeach    
                @endif                
                    
                </div>
                
            </div>    
        </section>
    </main>

@endsection