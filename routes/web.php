<?php

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CalendarController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/calendar/{year?}', [CalendarController::class, 'show'])->name('calendar.show');

Route::get('/calendar', function () {
    return view('calendar');
});

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');

