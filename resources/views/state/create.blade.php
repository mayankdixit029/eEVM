@extends('layouts.app')
@section('content')

<body>

<div class="jumbotron" style="padding: 25px 50px 75px 100px">
<br><br>
<form action="/state/store" method="POST">
@csrf()
<h1 class="display-4" style="margin-left: 450px;"><b>Add States</b></h1>
  <br>
  <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Enter State Name</span>
  </div>
  <input type="text"  name='name' class="form-control" placeholder="Enter State Name" aria-label="Username" aria-describedby="basic-addon1">
</div>
<br>

<br>
<input class="btn btn-primary btn-lg" style="margin-left: 500px;" type="submit"  value="Enter seat">

</div>
</form>
</body>
</html>
@endsection