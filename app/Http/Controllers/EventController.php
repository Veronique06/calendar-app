<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Création de l'événement
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Redirection avec un message de succès
        return redirect()->route('calendar.show', ['year' => Carbon::parse($request->start_date)->year])
                         ->with('success', 'Événement ajouté avec succès !');
    }
}

