@extends('layouts.app')
@section('content')

<body>
<div class="container">
    <div class="jumbotron">
    <h1  style="margin-left: 460px;"><b>All States</b></h1><br>
<a href="/state/create"><button style="margin-left: 660px;"class=" btn btn-primary mb-2 ">Add States</button></a>
<table class="table table-dark">
<tr>
<th scope="col">Sr. No.</th>
<th>State Name</th>
<th>District Name</th>

<th>Action</th>
</tr>

@foreach($states as $index =>$state)
<tr>
<th scope="row">{{$index + $states->firstItem()}}</th>

<td>{{$state->name}}</td>
<td>
@foreach($state->districts as  $district)

#{{$district->name}}<br>

@endforeach
</td>

<td>

<form method="POST" action="/state/{{$state->id}}/delete">
    @csrf()
    @method('delete')

        <button class="btn btn-danger">Delete</button>
  
    @endforeach
</form>
</td>
</tr>
</table>
{{$states->links()}}
</div>
</body>
</html>
@endsection