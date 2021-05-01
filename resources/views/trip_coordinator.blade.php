@extends('layouts.app')

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>{{ $trip->name }}</title>
</head>

<body>
    @section('content')
    <h1>{{$trip->name}}</h1>

    @if($trip->photo != null && !empty($trip->photo))
    <br><img src="{{$trip->photo}}">
    @endif
    
    <br><br>

    Description: {{$trip->description}}<br>
    City: {{$trip->city}}<br>
    Date: {{$trip->scheduled_at}}<br>
    Seats: {{$trip->seats}}<br>
    Available Seat: {{$availableSeats}}<br>

    <br><br>

    @if ($availableSeats > 0)
    Pending applications: (Click on user to accept)<br>
    @foreach ($tripPendingApplications as $application)
        <a href="{{ route('accept', ['id' => $application->id, 'trip' => $trip->id]) }}">{{ $application->user->name }}</a><br>
    @endforeach
    @endif

    @endsection
</body>
</html>