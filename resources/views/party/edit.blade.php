@extends('layouts.app')
@section('content')

<body>

<div class="jumbotron" style="padding: 25px 50px 75px 100px">
<br><br>
<form action="/party/{{$party->id}}/update" method="POST" enctype="multipart/form-data">
@csrf()
@method('put')
<h1 class="display-4" style="margin-left: 450px;"><b>Add Parties</b></h1>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Enter Party Name</span>
  </div>
  <input type="text"  name='name' class="form-control"  value="{{$party->name}}" placeholder="Enter Party Name" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>

                        <div class="form-group">
                            <label for="image">Party Symbol</label>
                            <input name="image" type="file" class="form-control" id="image" value="{{$party->image}}">
                            <img class="img-thumbnail" src="{{asset($party->image)}}" width="100%" height="auto" >
                        </div>
                        
<br>

<input class="btn btn-primary btn-lg" style="margin-left: 500px;" type="submit"  value="Enter party">

</div>
</form>
</body>
</html>
@endsection