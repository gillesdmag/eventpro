<?php

use App\Models\User;

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
$events=Event::all()->where('status',"=",1)->where("end_time",">",now())->take(5);
    return view('welcome',compact("events"));
});

Route::get("/events",function(){
    $events=Event::all()->where('status',"=",1)->where("end_time",">",now());
    return view('events',compact("events"));
})->name("events");

Auth::routes();

Route::middleware(["auth"])->group(function(){
    Route::get('/event/new',[App\Http\Controllers\EventsController::class,"new"])->name("new_event");
    Route::post('/event/create',[App\Http\Controllers\EventsController::class,"create"])->name("create_event");
    Route::post('/event/update',[App\Http\Controllers\EventsController::class,"update"])->name("update_event");
    Route::get('/event/edit/{id}',[App\Http\Controllers\EventsController::class,"edit"])->name("edit_event");
    Route::get('/event/delete/{id}',[App\Http\Controllers\EventsController::class,"delete"])->name("delete_event");
    Route::get('/event/publish/{id}',[App\Http\Controllers\EventsController::class,"publish"])->name("publish_event");
   
    

    Route::get('/ticket/add/{id}',[App\Http\Controllers\TicketsController::class,"new"])->name('event_ticket_add');
    Route::get('/ticket/show/{id}',[App\Http\Controllers\TicketsController::class,"show"])->name('event_ticket_show');
    Route::get('/ticket/delete/{id}',[App\Http\Controllers\TicketsController::class,"delete"])->name('event_ticket_delete');
    Route::post('/ticket/update',[App\Http\Controllers\TicketsController::class,"update"])->name('event_ticket_update');
    Route::post('/ticket/create',[App\Http\Controllers\TicketsController::class,"create"])->name('event_ticket_create');
    Route::get('/ticket/edit/{id}',[App\Http\Controllers\TicketsController::class,"edit"])->name('event_ticket_edit');



});
Route::get('/ticket/index/{id}',[App\Http\Controllers\TicketsController::class,"index"])->name('event_ticket_all');
Route::get('/event/show/{id}',[App\Http\Controllers\EventsController::class,"show"])->name("show_event");


Route::get("/messali/organizer/dashboard",[\App\Http\Controllers\DashboardController::class,"organizer"])->middleware(['is_organizer'])->name('organizer_dashboard');
Route::post('/messali/new/promotor',[\App\Http\Controllers\DashboardController::class,"store_promotor"])->middleware(["is_organizer"])->name("add_promotor");


Route::get("/messali/promotor/dashboard",[\App\Http\Controllers\DashboardController::class,"promotor"])->middleware(['is_promotor'])->name('promotor_dashboard');



Route::get("/messali/client/dashboard",[\App\Http\Controllers\DashboardController::class,"client"])->middleware(['is_client'])->name('client_dashboard');


