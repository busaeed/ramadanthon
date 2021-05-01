<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Trip;
use Illuminate\Support\Facades\Auth;

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

        return view('volunteerNew');
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
        return view('orgControlPanel');
    }



}
