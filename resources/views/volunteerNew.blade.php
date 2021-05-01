@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orgControlPanel page</title>
</head>
<body>
    <h1>الفرص التطوعية المتاحة</h1>
    @foreach ($trips as $trip)
        Trip Id: {{$trip->id}}<br>
        Trip Name: {{$trip->name}}<br>
        Trip City: {{$trip->city}}<br>
        Trip Photo: {{$trip->photo}}<br>
        Trip Date: {{$trip->scheduled_at}}<br>
        Trip Seats: {{$trip->seats}}<br>
        Trip Available Seats: {{$trip->available_seats}}<br>
        <a style="font-weight: bold;" href="trip/{{$trip->id}}">Click here for more details</a><br>
        <br>
    @endforeach
</body>
</html>

@endsection