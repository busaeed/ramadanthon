@extends('layouts.app')

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>ادارة الرحلات التطوعية</title>
    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color:  #cccccc}
tr:nth-child(odd){background-color: #808080}


th {
  background-color: #8c7373;
  color: white;
}
</style>
</head>

,<body>
    @section('content')

    <h1>ادارة الفرص التطوعية</h1>
        <div class="m-2 float-right">
            <a href="{{ route ('trip.create')}}" class="btn btn-dark">اضافة رحلة جديدة</a> 
        </div>

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

        </body>