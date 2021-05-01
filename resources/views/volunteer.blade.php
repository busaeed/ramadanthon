@extends('layouts.app')

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>الفرص التطوعية المتاحة</title>
</head>

<body>
    @section('content')
    <h1>الفرص التطوعية المتاحة</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th >ID</th>
            <th >Name</th>
            <th >City</th>
            <th >Photo</th>
            <th >Date</th>
            <th >Seats</th>
            <th >Available Seats</th>
            <th>Details</th>
        </tr>
        </thead>
        <tbody>
        @foreach($trips as $trip)
            <tr>
                <td>{{$trip->id}}</td>
                <td>{{$trip->name}}</td>
                <td>{{$trip->city}}</td>
                <td>{{$trip->photo}}</td>
                <td>{{$trip->scheduled_at}}</td>
                <td>{{$trip->seats}}</td>
                <td>{{$trip->available_seats}}</td>
                <td><a style="font-weight: bold;" href="trip/{{$trip->id}}">Click Here</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection
</body>
</html>