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
