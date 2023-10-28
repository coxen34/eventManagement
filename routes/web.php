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



Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => 'events'], function () {

    Route::get('/', [EventController::class, 'index']);
    Route::get('create', [EventController::class, 'create']);
    Route::get('showEvents', [EventController::class, 'showEvents'])->name('events.showEvents');
    Route::get('filter', [EventController::class, 'filter'])->name('events.filter');

    Route::get('category/{category}', [EventController::class, 'showEventsCategory'])->name('events.showEventsCategory');
    Route::get('showEventWithOrganizers/{eventId}', [EventController::class, 'showEventWithOrganizers'])->name('events.showEventWithOrganizers');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('editField/{eventId}/{field}', [EventController::class, 'editField'])->name('events.editField');

    Route::post('remove-organizer/{eventId}/{organizerId}', [EventController::class, 'removeOrganizer'])->name('events.removeOrganizer');
    

    Route::put('updateField/{eventId}', [EventController::class, 'updateField'])->name('events.updateField');
    Route::delete('destroy/{eventId}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::post('events/addOrganizer/{eventId}', 'App\Http\Controllers\EventController@addOrganizer')->name('events.addOrganizer');
});
