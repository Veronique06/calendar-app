<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    //
    // public function show($year = null)
    // {
    //     $year = $year ?? now()->year;
    //     $months = [];

    //     for ($month = 1; $month <= 12; $month++) {
    //         $daysInMonth = Carbon::create($year, $month, 1)->daysInMonth;
    //         $days = [];

    //         for ($day = 1; $day <= $daysInMonth; $day++) {
    //             $date = Carbon::create($year, $month, $day)->format('Y-m-d');

    //             // Récupérer les événements qui commencent ou incluent cette date
    //             $events = Event::where('start_date', '<=', $date)
    //                            ->where('end_date', '>=', $date)
    //                            ->get();

    //             $days[] = [
    //                 'day' => $day,
    //                 'date' => $date,
    //                 'events' => $events
    //             ];
    //         }

    //         $months[$month] = [
    //             'name' => Carbon::create($year, $month, 1)->translatedFormat('F'),
    //             'days' => $days,
    //         ];
    //     }

    //     return view('calendar', compact('year', 'months'));
    // }

    public function show($year = null)
    {
        $year = $year ?? now()->year;
        $months = [];

        for ($month = 1; $month <= 12; $month++) {
            $daysInMonth = Carbon::create($year, $month, 1)->daysInMonth;
            $days = [];

            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = Carbon::create($year, $month, $day)->format('Y-m-d');

                // Récupérer les événements qui commencent ou incluent cette date
                $events = Event::where('start_date', '<=', $date)
                            ->where('end_date', '>=', $date)
                            ->get();

                $days[] = [
                    'day' => $day,
                    'date' => $date,
                    'events' => $events
                ];
            }

            $months[$month] = [
                'number' => $month,  // ✅ Correction : Ajout du numéro du mois
                'name' => Carbon::create($year, $month, 1)->translatedFormat('F'),
                'days' => $days,
            ];
        }

        return view('calendar', compact('year', 'months'));
    }

}
