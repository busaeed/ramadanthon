<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

Use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function volunteer(){
        $currentDate = Carbon::today()->toDateString();

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

        return view('volunteer', compact('trips'));
    }

    public function apply($id) {
        $user = Auth::user();
        $application = new Application();
        $application->user_id = $user->id;
        $application->trip_id = $id;
        $application->save();
        return redirect()->route('trip.show', ['trip' => $id]);

    }

}
