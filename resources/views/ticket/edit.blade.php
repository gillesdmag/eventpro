@extends('layouts.app')

@section('content')
 <form action="{{ route('event_ticket_update') }}" method="POST">
 @csrf
     <p>
         <label for="type">Type de ticket</label>
         <select name="type_id" id="type_id">
             {{$types}}
             @foreach($types as $type)
                <option value="{{$type->id}}" {{$ticket->type_id==$type->id ? "selected" :"unselected"}}>{{$type->type_name}}</option>
             @endforeach
         </select>
     </p>
     <p>
         <label for="price">Prix</label>
         <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $ticket->price}}">
         @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
     </p>
     <input type="number" name='id' id='id' value="{{$ticket->id}}" hidden>
     <input type="submit" value="update">
 </form>
@endsection