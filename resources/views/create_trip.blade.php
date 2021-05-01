@extends('layouts.app')
@section('content')
<h1>Add new Trip</h1>
<form action="{{ route('trip.store') }}" method="post"  enctype="multipart/form-data">
    @csrf 
        
            <div class="form-group">
            <label for="name"><span style="color:red;">* </span>Trip Name</label>
            <input type="text" name="name" id="name" placeholder="Name" class="form-control" required>
            </div>
                        
            <div class="form-group">
                <label for="city"><span style="color:red;">* </span>City</label>
                <select name="city" id="city" class="form-control">
                    <option value="Riyadh">Riyadh</option>
                    <option value="Jeddah">Jeddah</option>
                    <option value="Dammam">Dammam</option>
                </select>
            </div> 

            <div class="form-group">
                <label for="photo"></span>Photo</label>
                <input type="text" name="photo" id="photo" placeholder="photo" class="form-control" >
            </div>

            <div class="form-group">
                <label for="description"><span style="color:red;">* </span>Description</label>
                <input type="text" name="description" id="description" placeholder="description" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="gender"><span style="color:red;">* </span>Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="both">Male & Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="seats"><span style="color:red;">* </span>Seats</label>
                <input type="number" name="seats" id="seats" placeholder="seats" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="scheduled_at"><span style="color:red;">* </span>scheduled_at</label>
                <input type="datetime-local" name="scheduled_at" id="scheduled_at"  class="form-control" required>
            </div>


            <!-- Submit And Reset Button   -->
            <input class="btn btn-dark" type="submit" >
            <input class="btn btn-dark" type="reset">

           
        </form>

@endsection