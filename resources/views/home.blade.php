@extends('layouts.app')

@section('content')

 
<section class="profile-page">
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">
            <div class="card p-3 py-4">
                <div class="text-center"> <img src="{{asset('images/testi1.jpg')}}" width="100" class="rounded-circle"> </div>
                <div class="text-center mt-3"> <span class="bg-secondary p-1 px-4 rounded text-white">Profile</span>
                    <h5 class="mt-2 mb-0"> {{Auth::user()->name}}</h5> 
                    <p><i class="fa fa-phone mr-2"
                                    aria-hidden="true"></i>{{Auth::user()->contact}}</p>
                      <p><i class="fa fa-envelope mr-2"
                                    aria-hidden="true"></i>{{Auth::user()->email}} </p>
                           @if(Auth::user()->type_user_id!=3)
                            <p> Agence Name: {{Auth::user()->agence()->get()[0]->agence_name }}</p>
                            <div class="px-4 mt-1">
                             <p >Agence description: {{Auth::user()->agence()->get()[0]->description}}</p>
                         </div>
                          @endif
                   
                    <ul class="social-list">
                        <li><i class="fa fa-facebook"></i></li>
                        
                        <li><i class="fa fa-google"></i></li>
                    </ul>
                   
                </div>
            </div>
        </div>
    </div>
</div>

 </section>
  @endsection
