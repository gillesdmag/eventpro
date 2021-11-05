@extends('layouts.app')

@section('content')

    <div class="blog-section py-5" id="events">
        <div class="container py-md-5 py-4">
            <div class="waviy text-center mb-md-5 mb-4">
                <span style="--i:1">L</span>
                <span style="--i:2">i</span>
                <span style="--i:3">s</span>
                <span style="--i:4">t</span>
                <span style="--i:5">e</span>
                <span style="--i:6"> </span>
                <span style="--i:7">de</span>
                <span style="--i:8"> </span>
                <span style="--i:1">v</span>
                <span style="--i:8">o</span>
                <span style="--i:3">s</span>
                <span style="--i:1"> </span>
                <span style="--i:2">E</span>
                <span style="--i:3">v</span>
                <span style="--i:4">è</span>
                <span style="--i:5">n</span>
                <span style="--i:6">e</span>
                <span style="--i:7">m</span>
                <span style="--i:8">e</span>
                <span style="--i:1">n</span>
                <span style="--i:2">t</span>
                
               
            </div>
          
            <div class="row">
                    @forelse($events as $event)
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
                                                    publié <img src="https://img.icons8.com/fluency/25/000000/submit-for-approval.png"/>
                                                    @elseif ($event->status==0)
                                                    En attente <img src="https://img.icons8.com/color/25/000000/data-pending.png"/>
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </article>       
                            </div>
                                <div class="btns">

                                    <a href="{{route('show_event',$event->id)}}" class="btn btn-outline-primary">En savoir +</a>
                                    <a href="{{route('event_ticket_add',$event->id)}}" class="btn btn-outline-primary">Ajouter un ticket</a>

                                    @empty
            <h1 style="text-align:center; color:var(--white); margin-top:20px; font-size:17px">Aucun evènement disponible</h1>
        @endforelse
            </div>
            
           
    </div>
  @endsection
