<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

Use \Carbon\Carbon;

class movePageController extends Controller
{
    //

    public function GoToOrgControlPanel(){

        return view('orgControlPanel');
    }

    public function GoToVolunteerNew(){

        $currentDateTime = Carbon::today();

        $trips = Trip::select('name')
            ->where('scheduled_at', '>', $currentDateTime);

        //return view('volunteerNew');

        return dd($currentDateTime);
    }

    public function GoToVolunteerPast(){

        return view('volunteerPast');
    }


}
