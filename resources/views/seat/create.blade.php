@extends('layouts.app')
@section('content')

<body>

<div class="jumbotron" style="padding: 25px 50px 75px 100px">
<br><br>
<form action="/seat/store" method="POST">
@csrf()
<h1 class="display-4" style="margin-left: 450px;"><b>Add Seats</b></h1>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Enter Seat Name</span>
  </div>
  <input type="text"  name='name' class="form-control" placeholder="Enter Seat Name" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>

<br>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Enter Candidate ID</span>
    <input type="text"  name='candidate_id' class="form-control" placeholder="Enter Candidate ID" aria-label="Username" aria-describedby="basic-addon1">
</div>
</div>
  <br>
  <br>
    <div class="form-group">
  <label for="sel1">Select District</label>
  <select class="form-control" id="sel1" name="district_id">
  <option selected>Choose District</option>
    @foreach($districts as $district)
    <option value="{{$district->id}}">{{$district->name}}</option>
    @endforeach
    </select>
    </div>
    <br>
 
<br>
<input class="btn btn-primary btn-lg" style="margin-left: 500px;" type="submit"  value="Enter seat">

</div>
</form>
</body>
</html>
@endsection