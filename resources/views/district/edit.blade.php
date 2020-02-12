@extends('layouts.app')
@section('content')

<body>
<div class="container" >
<div class="jumbotron" >
<br><br>
<form action="/district/{{$district->id}}/update" method="POST" >

@csrf()
@method('put')
  <h1 class="display-4" style="margin-left: 360px;"><b>Add Districts</b></h1>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Name of District </span>
  </div>
  <input type="text" value="{{$district->name}}" name ="name" class="form-control" placeholder="Name of District" aria-label="Username" aria-describedby="basic-addon1">
</div>

   <br>


<br>
<br>
<div class="form-group">
  <label for="sel1">Select State:</label>
  <select class="form-control" id="sel1" name="state_id">
    @foreach($states as $state)
    <option
    @if($state->id==$district->seat_id)
    selected
    @endif
     value="{{$state->id}}">{{$state->name}}</option>
    @endforeach
    </select>
    </div>
   
    <br>
    

<input style="margin-left: 500px;" class="btn btn-primary btn-lg" type="submit"  value="Submit">

 </div>
</div>
</form>
</div>
</body>
</html>
@endsection