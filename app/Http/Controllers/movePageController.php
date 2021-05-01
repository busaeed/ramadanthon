<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
Use \Carbon\Carbon;

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

        $trips = Trip::select('name')
            ->where('scheduled_at', '>', $currentDateTime);

        //return view('volunteerNew');

        return dd($currentDateTime);
    }

    public function GoToVolunteerPast(){

        $currentDateTime = Carbon::today();
        $Trips = Trip::all();
        foreach($Trips as $key=>$Trip)
                {
                    if($Trip->scheduled_at > $currentDateTime)
                    {
                        $Trips->forget($key);
                    }
                }
        return view('volunteerPast',compact('Trips'));
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
