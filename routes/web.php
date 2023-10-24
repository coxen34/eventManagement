<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
/* Route::get('/', HomeController::class );

Route::controller(EventController::class)->group(function(){
    Route::get('events', 'index');
    Route::get('events/create', 'create');
    Route::get('events/showEvents', 'showEvents')->name('events.showEvents');
    Route::get('events/category/{category}', 'showEventsCategory')->name('events.showEventsCategory');
    
    Route::get('/events/showEventWithOrganizers/{eventId}', 'EventController@showEventWithOrganizers')->name('events.showEventWithOrganizers'); */

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'events'], function () {
    /* Route::get('/', [EventController::class, 'index']);

    Route::get('create', [EventController::class, 'create']);

    Route::get('showEvents', [EventController::class, 'showEvents'])->name('events.showEvents');

    Route::get('category/{category}', [EventController::class, 'showEventsCategory'])->name('events.showEventsCategory');

    Route::get('showEventWithOrganizers/{eventId}', [EventController::class, 'showEventWithOrganizers'])->name('events.showEventWithOrganizers');

    Route::post('events', [EventController::class, 'store'])->name('events.store');
    
    Route::get('/events/{eventId}/edit/{field}', 'EventController@editField')->name('events.editField');

    Route::get('/events/{eventId}/remove-organizer/{organizerId}', 'EventController@removeOrganizer')->name('events.removeOrganizer');

    Route::post('/events/{eventId}/update-field', 'EventController@updateField')->name('events.updateField');

    Route::get('/events/editField/{eventId}/{field}', 'EventController@editField')->name('events.editField');
 */
    Route::get('/', [EventController::class, 'index']);
    Route::get('create', [EventController::class, 'create']);
    Route::get('showEvents', [EventController::class, 'showEvents'])->name('events.showEvents');

    Route::get('category/{category}', [EventController::class, 'showEventsCategory'])->name('events.showEventsCategory');
    
    Route::get('showEventWithOrganizers/{eventId}', [EventController::class, 'showEventWithOrganizers'])->name('events.showEventWithOrganizers');

    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('editField/{eventId}/{field}', [EventController::class, 'editField'])->name('events.editField');
    Route::get('remove-organizer/{eventId}/{organizerId}', [EventController::class, 'removeOrganizer'])->name('events.removeOrganizer');
    
    //Cual de los dos siguientes funciona??????????
    Route::post('update-field/{eventId}', [EventController::class, 'updateField'])->name('events.updateField');

    Route::put('update-field/{eventId}', [EventController::class, 'updateField'])->name('events.update');


    
    
    Route::delete('destroy/{eventId}',[EventController::class,'destroy'])->name('events.destroy');

 
    Route::post('events/addOrganizer/{eventId}', 'App\Http\Controllers\EventController@addOrganizer')->name('events.addOrganizer');

    







});
