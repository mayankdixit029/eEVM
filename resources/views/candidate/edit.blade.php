@extends('layouts.app')
@section('content')

<body>
<div class="container" >
<div class="jumbotron" >
<br><br>
<form action="/candidate/{{$candidate->id}}/update" method="POST" enctype="multipart/form-data">

@csrf()
@method('put')
  <h1 class="display-4" style="margin-left: 360px;"><b>Add Candidate</b></h1>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Name of Candidate </span>
  </div>
  <input type="text"  name ="name" class="form-control" value="{{$candidate->name}}" placeholder="Name of Candidate" aria-label="Username" aria-describedby="basic-addon1">
</div>

   <br>


<br>
<br>
<div class="form-group">
  <label for="sel1">Select Seat:</label>
  <select class="form-control" id="sel1" name="seat_id">
    @foreach($seats as $seat)
    <option
    @if($seat->id==$candidate->seat_id)
    selected
    @endif
     value="{{$seat->id}}">{{$seat->name}}</option>
    @endforeach
    </select>
    </div>
   
    <br>
    <div class="form-group">
  <label for="sel1">Select Party:</label>
  <select class="form-control" id="sel1" name="party_id">
    @foreach($parties as $party)
    <option
    @if($party->id==$candidate->party_id)
    selected
    @endif
     value="{{$party->id}}">{{$party->name}}</option>
    @endforeach
    </select>
    </div>

<input style="margin-left: 500px;" class="btn btn-primary btn-lg" type="submit"  value="Submit">

 </div>
</div>
</form>
</div>
</body>
</html>
@endsection