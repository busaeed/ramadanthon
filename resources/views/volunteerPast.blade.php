@extends('layouts.app')
@section('content')


    <h1>volunteerPast</h1>

    <table class="table table-striped">
            <thead>
            <tr>
                <th >ID</th>
                <th >Name</th>
                <th >City</th>
                <th >Description</th>
                <th >Seats</th>
                <th >Gender</th>
                <th >Scheduled_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Trips as $Trip)
                <tr>
                    <td>{{$Trip->id}}</td>
                    <td>{{$Trip->name}}</td>
                    <td>{{$Trip->city}}</td>
                    <td>{{$Trip->description}}</td>
                    <td>{{$Trip->seats}}</td>
                    <td>{{$Trip->gender}}</td>
                    <td>{{$Trip->scheduled_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection