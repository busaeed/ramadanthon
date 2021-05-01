<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $Trips = $user->trips()->get();
        return view('trip_management',compact('Trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_trip');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $user->trips()->create($request->all());
        return redirect()->route('trip.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trip = Trip::find($id);
        $isDateOver = Carbon::today()->greaterThanOrEqualTo($trip->scheduled_at);
        $user = Auth::user();
        $availableSeats = $trip->seats - Application::where('trip_id', '=', $id)->where('accepted', '=', '1')->count();
        if ($user->role === "volunteer") {
            $hasAlreadyapplied = Application::where('user_id', '=', $user->id)->where('trip_id', '=', $id)->count() == 0 ? false : true;
            return view('trip_volunteer', compact('trip', 'hasAlreadyapplied', 'isDateOver', 'availableSeats'));
        } else {
            return view('trip_coordinator', compact('trip'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
