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
                            <!--
                            <div class="form-group">
                                <label for="search-word" class="sr-only">Hakusana</label>
                                <input type="text" id="search-word" class="form-control button-pics" placeholder="Hakusanat...">    
                            </div>-->
                            
                            <div class="form-group search-pics">
                                <div>
                                    <label for="pics-search" class="sr-only">Hakusanat</label>
                                    <input id="pics-search" type="text" class="form-control button-pics" placeholder="Hakusanat...">
                                </div>
                                <button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>    
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
                                    <i class="fa fa-comments"></i><!-- tämä kesken!! {!!$image->messages !!} <!-- tähän kommenttien määrä -->
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