@extends('layouts.app')

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>الفرص التطوعية المتاحة</title>
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
    Available Seat: {{$trip->seats-$numberOfApplications}}<br>

    <br>

    @if ($hasAlreadyapplied)
        YOU HAVE ALREADY APPLIED FOR THIS VOLUNTEERY WORK.
    @elseif ($trip->seats-$numberOfApplications < 1 || $isDateOver)
        SORRY, YOU CANNOT APPLY FOR THIS VOLUNTEERY WORK.
    @else
        <a style="font-weight: bold;" href="{{ route('apply', ['id' => $trip->id]) }}">APPLY NOW FOR THIS VOLUNTEERY WORK.</a>
    @endif

    @endsection
</body>
</html>