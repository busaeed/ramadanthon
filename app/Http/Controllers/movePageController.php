<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Trip;
use Illuminate\Http\Request;

Use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class movePageController extends Controller
{
    //

    public function GoToOrgControlPanel(){

        return view('orgControlPanel');
    }

    public function GoToVolunteerNew(){

        $currentDateTime = Carbon::today();

        $availableSeats = Application::select(DB::raw("trips.seats - count(*)"))
            ->where('trip_id', '=', 'trips.id')
            ->where('accepted', '=', '1');

        $trips = Trip::select('id', 'name', 'city', 'scheduled_at', 'photo', 'seats', DB::raw("({$availableSeats->toSql()}) as availabe_seats"))
            ->mergeBindings($availableSeats->getQuery())
            ->where('scheduled_at', '>', $currentDateTime)
            ->get();

        //return view('volunteerNew');

        return dd($trips);
    }

    public function GoToVolunteerPast(){

        return view('volunteerPast');
    }


}
