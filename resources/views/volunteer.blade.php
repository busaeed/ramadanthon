@extends('layouts.app')

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>الفرص التطوعية المتاحة</title>
    <style>
        .ttt{

  margin: auto;
  width: 60%;

  padding: 10px;
    text-align: center;

        }
    </style>

</head>

<body>
    @section('content')
    <div class="ttt">
    <h2>الفرص التطوعيه</h2>
    <p><strong>ملاحظه</strong> يشترط على المتطوعين ابراز تطبيق توكلنا وللتأكد من اخذ لقاج كورونا19</p>
    </div>

    <div class="container">
        <div class="card-deck">
        @foreach($trips as $trip)
            <div class="card bg-light">
                <div class=" card-body text-center">
                    <img class="card-img-top" src="img1/des.jpg" alt="Card image" style="width:100%">
                    <br>
                    <h4 class="card-title">{{$trip->name}}</h4>
                    <h6 class="card-text">{{$trip->description}}</h6>
                    <p class="card-text">{{$trip->scheduled_at}}</p>
                    <p class="card-text">الجنس : {{$trip->gender}}</p>
                    <p class="card-text">عدد المتطوعين المطلوب {{$trip->seats}}/{{$trip->available_seats}}</p>
                    <a href="#" class="btn btn-primary">Join</a>
                </div>
            </div> 
            @endforeach
        </div>    
    </div>
    
    
    <br>
    
    @endsection
</body>
</html>