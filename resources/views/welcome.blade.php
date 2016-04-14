@extends('layouts.app')

@section('content')
    <header id="hero" class="hero of-hidden">
        <object class="pics-logo-animation trans-centered" type="image/svg+xml" data="logo_bg_2.svg"></object>    
    </header>
        
    <main class="light-shadow of-hidden">
        <div class="color-line-pics"><div></div></div>
        <section class="container-fluid container-pics">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="col-pics">
                        <h2>Otsikkoa...</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>    
                </div>    
                <div  class="col-md-8 col-lg-9 col-pics of-hidden">
                    
                    <div id="ajaxImageWrapper" class="row">
                        <!-- images will be here via ajax call -->
                    </div> 
                    <button id="loadMoreImages" class="btn btn-default button-pics col-md-push-4 col-md-4 c1-bg btn-margin">Lataa lisää...</button>
                </div>
                
            </div>    
        </section>
    </main>  
@endsection
