<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    function new(){
        $categories=Categorie::all();
        return view('event/new',compact("categories"));
    }
      /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'event_name' => ['required' ,'string', 'max:255'],
            'event_description' => [ 'required' ,'string', 'max:255',],
            'zone' => ['required' , 'string'],
            'cats' => [],
            'start_time' => 'required|date_format:"Y-m-d\TH:i"|after:today',
            'end_time'=>'required|date_format:"Y-m-d\TH:i"|after:start_time'
        
     
     ]);
    }

    /*************************************************** */

    function publish($id){

        $event=Event::findOrFail($id);
        $event->status=1;
        $event->publish_date= now();
        $event->save();
        return redirect()->action([HomeController::class,'index']);
    }

    /*************************************************** */


    function edit($id){
        $categories=Categorie::all();

        $event=Event::findOrFail($id);
        $cats=json_decode($event->cats);
        $tags=explode(",",$event->tag);
        return view('event/edit',compact('event','categories',"tags","cats")); 

    }
    /*************************************************** */

    function update(Request $request){
       $event=Event::findOrFail($request['id']);
        $this->validator($request->all())->validate();
        $tags="";
        for($i=1;$i<=5;$i++){
           if(array_key_exists("tag".$i,$request->all()) and $request["tag".$i]!="") {
            $tags.=$request["tag".$i].",";
           }
        }
        $tags=rtrim($tags,",");
        $request['tag']=$tags;
        $event->update($request->all());
       return redirect()->route("show_event",[$event]);
    }

    /*************************************************** */


    function delete($id){
     Event::destroy($id);
     return redirect()->action([HomeController::class,'index']);

    }

    /*************************************************** */

    function index() {
        $events=Event::all();
        return redirect()->action([HomeController::class,'index']);
    }

    //*************************************************** */


    function show($id)
    {
        $event=Event::findOrFail($id);
        $tickets=$event->tickets;
        return view('event/show',compact("event","tickets"));

    }


    /*************************************************** */
    function create(Request $request){

        $this->validator($request->all())->validate();
        $tags="";
        for($i=1;$i<=3;$i++){
            if(array_key_exists("tag".$i,$request->all()) and $request["tag".$i]!="") {
                $tags.=$request["tag".$i].",";
            }
        }
        $tags=rtrim($tags,",");
        $event=new Event($request->all());
        $event->cats=json_encode($request['cats']);
        $event->agence_id=Auth::user()->agence_id;
        $event->user_id=Auth::user()->id;
        $event->tag=$tags;
        $event->status=0;
        $event->save();
    
     return redirect()->route("show_event",[$event]);

    }
}
