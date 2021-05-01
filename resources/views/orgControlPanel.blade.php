<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orgControlPanel page</title>

    <style>
            table, td, th {
            text-align: center;
            border: 1px solid black;
            }

            table {
            width: 100%;
            border-collapse: collapse;
            }
</style>
</head>
<body>

    <h1>هنا الكنترول للمنسق , يضيف تريب جديدة </h1>


        <div class="m-2 float-right">
            <a href="{{ route ('create')}}" class="btn btn-dark">اضافة رحلة جديدة</a> 
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th >ID</th>
                <th >Name</th>
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
                    <td>{{$Trip->description}}</td>
                    <td>{{$Trip->seats}}</td>
                    <td>{{$Trip->gender}}</td>
                    <td>{{$Trip->scheduled_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>