@extends('layouts.app')

@section('content')
<div class="waviy mb-sm-3 mb-2" style="text-align:center">
                            <span style="--i:1">M</span>
                            <span style="--i:2">o</span>
                            <span style="--i:3">d</span>
                            <span style="--i:4">i</span>
                            <span style="--i:5">f</span>
                            <span style="--i:6">i</span>
                            <span style="--i:7">e</span>
                            <span style="--i:7">r</span>
                            <span style="--i:8"> </span>
                            <span style="--i:1">E</span>
                            <span style="--i:2">v</span>
                            <span style="--i:3">è</span>
                            <span style="--i:4">n</span>
                            <span style="--i:5">e</span>
                            <span style="--i:6">m</span>
                            <span style="--i:7">e</span>
                            <span style="--i:7">n</span>
                            <span style="--i:8">t</span>
                            
                        </div>
                        <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                        
                            <div class="card-body">
                            <form method="POST" action="{{ route('update_event') }}" enctype="multipart/form-data">
                                           @csrf

                                    <div class="form-group row">
                                        <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('Event Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="event_name" type="text" class="form-control @error('naevent_nameme') is-invalid @enderror" name="event_name" value="{{ old('event_name') }}" required autocomplete="event_name" autofocus>

                                            @error('event_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="event_description" class="col-md-4 col-form-label text-md-right">{{ __('Event description') }}</label>

                                        <div class="col-md-6">
                                            <input id="event_description" type="texterea" class="form-control @error('event_description') is-invalid @enderror" name="event_description" value="{{ old('event_description') }}" required autocomplete="event_description">
                                            @error('event_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="zone" class="col-md-4 col-form-label text-md-right">{{ __('Localisation') }}</label>

                                        <div class="col-md-6">
                                            <input id="zone" type="text" class="form-control @error('zone') is-invalid @enderror" name="zone" value="{{ old('zone') }}" required autocomplete="zone">

                                            @error('zone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('Date de commencement') }}</label>

                                        <div class="col-md-6">
                                            <input id="start_time" type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}" required autocomplete="start_time">

                                            @error('start_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>                    
                                    <div class="form-group row">
                                        <label for="end_time" class="col-md-4 col-form-label text-md-right">{{ __('Date de fin') }}</label>

                                        <div class="col-md-6">
                                            <input id="end_time" type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}" required autocomplete="end_time">

                                            @error('end_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label for="profil_image" class="col-md-4 col-form-label text-md-right">{{ __('Etiquettes') }}</label>

                                        <div class="col-md-6">
                                        
                                            @for ($i=1; $i<=5; $i++)
                                            <p> <input id="tag{{$i}}" type="text" name="tag{{$i}}"></p>
                                            
                                            @endfor
                                        </div>
                                    </div>
                                    
                                <div class="form-group row">
                                        <label for="zone" class="col-md-4 col-form-label text-md-right">{{ __('categories:') }}</label>

                                        <div class="col-md-6">
                                        <select class="form-control" name="categories[]" >
                                            <option value="none" selected="" disabled="">Select Category</option>
                                                @forelse ($categories as $cat)
                                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                                                @empty
                                                @endforelse
                                    </select>
                                        </div>
                                    </div>
                                <hr>
                                        

                                

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Mofidier') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>
</div>

    
@endsection(