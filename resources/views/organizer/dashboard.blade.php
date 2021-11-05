@extends('layouts.app')

@section('content')

    <div class="blog-section py-5" id="events">
        <div class="container py-md-5 py-4">
            <div class="waviy text-center mb-md-5 mb-4">
                <span style="--i:1">T</span>
                <span style="--i:2">a</span>
                <span style="--i:3">b</span>
                <span style="--i:4">l</span>
                <span style="--i:5">e</span>
                <span style="--i:6">a</span>
                <span style="--i:7">u</span>
                <span style="--i:8"> </span>
                <span style="--i:1">d</span>
                <span style="--i:8">e</span>
                <span style="--i:3"></span>
                <span style="--i:2">b</span>
                <span style="--i:3">o</span>
                <span style="--i:4">r</span>
                <span style="--i:5">d</span>
               
            </div>
           
            <h1 style="text-align:center; color:var(--orange)">Liste des évènements</h1>
            @forelse($my_events as $event)
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
                    
                     </div>
            </div>
            @empty
            <h1 style="text-align:center; color:var(--white); margin-top:20px; font-size:17px">Aucun evènement disponible</h1>
        @endforelse
    </div>
    <!-- Evenements du promoteur -->
    <h1 style="text-align:center; color:var(--orange); margin-top:20px; font-size:20px">Evenement creer par votre promoteur</h1>
    @forelse($promotors as $promotor)

    <h5 style="text-align:center; color:white; margin-top:20px; font-size:20px"> {{$promotor->name}}</h5>
           @if(count($promotor->events()->get())!=0))
             
             @forelse($promotor->events()->get() as $event)
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
   
                            <a href="{{route('show_event',$event->id)}}" class="btn btn-outline-primary">En savoir +</a>
                           <a href="{{route('event_ticket_add',$event->id)}}" class="btn btn-outline-primary">Ajouter un ticket</a>
                       
                        </div>
               </div>
            @empty
         @endforelse
         @endif                

        @empty
        <h1 style="text-align:center; color:var(--white); margin-top:20px; margin-bottom:20px;font-size:17px">Aucun evènement promoteur</h1>
     
        @endforelse


<section class="bouton">
        <script type="text/javascript">
        function affCache(idDiv) {
        var div = document.getElementById(idDiv);
        if (div.style.display == "")
        div.style.display = "none";
        else
        div.style.display = "";
        }
        </script>

<div class="wrap">
  <button class="button"  href="#" onclick="affCache('ajouter');">Ajouter promoteur</button>
</div>


</section>


<div class="container" id="ajouter"  style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-body">
                    <form method="POST" action="{{ route('add_promotor') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('Promotor Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Promotor Email') }}</label>

                            <div class="col-md-6">
                                <input id="event_description" type="texterea" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  autocomplete="contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profil_image" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>

                            <div class="col-md-6">
                            <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('profil_image') is-invalid @enderror" id="customFile" name="profil_image">
                                        <label class="custom-file-label" for="customFile">Image de profile</label>
                                    </div>
                                @error('profil_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Créer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
  

 </section>
  @endsection
