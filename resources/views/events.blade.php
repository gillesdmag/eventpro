@extends('layouts.app')

@section('content')
<div class="mt-3">
<div class="row container" style="margin-top: 50px;">
    @forelse ($events as $event)
        <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-heart"></span>
            <div class="services-content">
                <h5 style="border-bottom:2px solid white;">{{$event->event_name}}</h5>
                <p>Start<b style="font-style:bold;font-size:20px"> {{date_formater($event->start_time)["jour"]}} {{date_formater($event->start_time)["jourMois"]}} {{date_formater($event->start_time)["mois"]}} {{date_formater($event->start_time)["annee"]}} {{date_formater($event->start_time)["heure"]}}h {{date_formater($event->start_time)["minutes"]}}min</b></p>
                <p>End <b style="font-style:bold;font-size:20px">{{date_formater($event->end_time)["jour"]}} {{date_formater($event->end_time)["jourMois"]}} {{date_formater($event->end_time)["mois"]}} {{date_formater($event->end_time)["annee"]}} {{date_formater($event->end_time)["heure"]}}h {{date_formater($event->end_time)["minutes"]}}min</b></p>
       
                <p>{{$event->event_description}}</p>
                <p><a href="{{route('show_event',$event->id)}}" class="btn bg-ligth text-dark">En savoir +</a></p>
            </div>
            
        </div>
                                        
        @empty
        <li><h1 class="text-center">Aucun evenement en cours</h1></li>
    @endforelse
</div>
</div>
@endsection