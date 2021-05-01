<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Trip;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
Use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class movePageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    //

    public function GoToOrgControlPanel(){

        $Trips = Trip::all();
        return view('orgControlPanel',compact('Trips'));
    }

    public function GoToVolunteerNew(){

        $currentDate = Carbon::today()->toDateString();;

        $trips = DB::select(DB::raw('
        select * from
            (select
            `id`,
            `name`,
            `city`,
            `scheduled_at`,
            `photo`,
            `seats`, 
            (select trips.seats-count(*) from `applications` where `trip_id` = trips.id and `accepted` = 1) as available_seats
            from `trips`) as thetable
            where thetable.scheduled_at > CURDATE()
            and thetable.available_seats > 0
        '));

        return view('volunteerNew', compact('trips'));

        //return dd($trips);
    }

    public function GoToVolunteerPast(){

        return view('volunteerPast');
    }

    public function create(){

        return view('create');
    }

    public function store(Request $request){
        
        $user = Auth::user();
        $user->trips()->create($request->all());

        //$Trips = Trip::create($request->all());
        // return view('orgControlPanel');
        return redirect()->route('orgControlPanel');
    }



}
