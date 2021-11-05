@extends('layouts.app')

@section('content')


<div class="container ">
                <div class="row justify-content-center">
               
                    <div class="col-md-8">
                        <div class="card">
                        
                            <div class="card-body">
                            
                    <form action="{{ route('event_ticket_create') }}" method="POST" class="main-input">
                  
                            @csrf
                                <p>
                                    <label for="type">Type de ticket</label>
                                    <select name="type_id" id="type_id">
                                        @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->type_name}}</option>
                                        @endforeach
                                    </select>
                                </p>
                                <p>
                                    <label for="price">Prix</label>
                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                    @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </p>
                                <input type="number" name="event_id" id="event_id" value="{{$id}}" hidden>
                                <input type="submit" value="ajouter">
                            </form>
                                                    </div>
                                                </div>
                                            </div>
                            </div>
</div>

    
@endsection(