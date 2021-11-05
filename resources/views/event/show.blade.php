@extends('layouts.app')

@section('content')

<header id="site-header" class="fixed-top">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg stroke">
            <style>
                    .avatar {
                            vertical-align: middle;
                            width: 200px;
                            height: 60px;
                            border-radius: 10%;
                            }
                </style>
                <h1>
                    <a class="navbar-brand d-flex align-items-center" href="index.html">
                        <img  class="avatar" src="{{ asset('images/logo.png') }}" alt=""> 
                     </a> 
                </h1>
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-lg-auto">
                     
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                     @guest
                          @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connecter</a>
                        </li>
                        @endif

                         @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                        </li>
                        @endif
                      @else
                        <li class="nav-item">
                         @if(Auth::user()->type_user_id==1)
                                <a href="{{route('organizer_dashboard')}}">Dashboard organiseur</a>
                            @endif
                        </li>
                        <li class="nav-item">
                          @if(Auth::user()->type_user_id==2)
                            <a href="{{route('promotor_dashboard')}}">Dashboard Promoteur</a>    
                            @endif
                        </li>
                        <li class="nav-item">
                          @if(Auth::user()->type_user_id==3)
                           <a href="{{route('client_dashboard')}}">Dashboard client</a>
                           @endif
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li class="nav-item">
                        <li class="nav-item"> {{ Auth::user()->name }}</li>
                    @endguest
                       
                    </ul>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
            </nav>
        </div>
    </header>
    <div class="blog-section py-5" id="events">
        <div class="container py-md-5 py-4">
            <div class="waviy text-center mb-md-5 mb-4">
                <span style="--i:1">E</span>
                <span style="--i:2">v</span>
                <span style="--i:3">e</span>
                <span style="--i:4">n</span>
                <span style="--i:5">t</span>
                <span style="--i:6"> </span>
                <span style="--i:7"> </span>
                <span style="--i:8">v</span>
                <span style="--i:1">i</span>
                <span style="--i:8">e</span>
                <span style="--i:3">w</span>
                
               
            </div>
          
            <div class="row">
           
                            <div class="container py-4">
                                <h1 class="h1 text-center" id="pageHeaderTitle"></h1>
                        
                                <article class="postcard dark red">
                                    <a class="postcard__img_link" href="#">
                                        <img class="postcard__img" src="{{asset('images/logo.png')}}" alt="Image Title" />	
                                    </a>
                                    <div class="postcard__text">
                                        <h1 class="postcard__title red"><a href="#">{{$event->event_name}}</a></h1>
                                        <div class="postcard__subtitle small">
                                            <time datetime="2020-05-25 12:00:00">
                                                <i class="fas fa-calendar-alt mr-2"></i>{{date_formater($event->start_time)["jour"]}} {{date_formater($event->start_time)["jourMois"]}} {{date_formater($event->start_time)["mois"]}} {{date_formater($event->start_time)["annee"]}} à {{date_formater($event->start_time)["heure"]}}h {{date_formater($event->start_time)["minutes"]}}min
                                            </time>
                                        </div>
                                        <div class="postcard__bar"></div>
                                        <div class="postcard__preview-txt">{{$event->event_description}}</div>
                                        <ul class="postcard__tagbox">
                                            <li class="tag__item">{{$event->zone}}</li>
                                            <li class="tag__item">Au: {{date_formater($event->end_time)["jour"]}} {{date_formater($event->end_time)["jourMois"]}} {{date_formater($event->end_time)["mois"]}} {{date_formater($event->end_time)["annee"]}} {{date_formater($event->end_time)["heure"]}}h {{date_formater($event->end_time)["minutes"]}}min</li>
                                            <li class="tag__item play red">
                                                <a href="#"> @forelse (explode(',',$event->tag) as $tag)
                                                    {{$tag}}
                                                    @empty
                                                    Pas d'etiquttes
                                                    @endforelse
                                                </a>
                                            </li>
                                            <li class="tag__item play red">
                                                <a href="#"> @if ($event->status==1)
                                                    publié
                                                    @elseif ($event->status==0)
                                                    En attente
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </article>
                            
                                
                            </div>
                     <div class="btns">

                           @auth
                          @if($event->status==0)
                            <a href="{{ route('publish_event',$event->id) }}" class="btn btn-sucess">Publier</a>
                          @endif
                          @if($event->start_time>now())
                            <a href="{{ route('edit_event',$event->id) }}" class="btn btn-info">Modifier</a>
                          @endif
                          @if(!($event->end_time>now() and now()>$event->start_time))
                          <a href="{{ route('delete_event',$event->id) }}" class="btn btn-danger">Supprimer</a>
                        @endif
                        @endauth
                     </div>
            </div>
            @include("/ticket/_index")
           
    </div>
  @endsection
