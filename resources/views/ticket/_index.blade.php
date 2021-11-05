
<h1>Liste des tickets de l'évenement</h1>
<div class="row">

@foreach($tickets as $ticket)
       <div class="col m-3">
           <p>Ticket : 
               @if($ticket->type_id==1)
               VIP
               @elseif($ticket->type_id==2)
               RESERVATION
               @else
               SIMPLE
               @endif
              </p>
           <p>Prix :{{$ticket->price}}</p>
           @if(Auth::user()!=null and  Auth::user()->id== $ticket->event()->get()[0]->user()->get()[0]->id)
           <a href="{{route('event_ticket_delete',$ticket->id)}}" class="btn ">Supprimer</a>
           <a href="{{route('event_ticket_edit',$ticket->id)}}" class="btn ">Modifier</a>
           @elseif(Auth::user()==null)
           <a href="{{route('event_ticket_edit',$ticket->id)}}" class="btn ">Acheter</a>

          @endif
       </div>  
</div>