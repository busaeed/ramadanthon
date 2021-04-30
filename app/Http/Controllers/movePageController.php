<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class movePageController extends Controller
{
    //

    public function GoToOrgControlPanel(){

        return view('orgControlPanel');
    }

    public function GoToVolunteerNew(){

        return view('volunteerNew');
    }

    public function GoToVolunteerPast(){

        return view('volunteerPast');
    }


}
