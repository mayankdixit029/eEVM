@extends('layouts.app')
@section('content')

<body>
<div class="container">
    <div class="jumbotron">
    <h1  style="margin-left: 460px;"><b>All Seats</b></h1><br>
<a href="/seat/create"><button style="margin-left: 660px;"class=" btn btn-primary mb-2 ">Add Seats</button></a>
<table class="table table-dark">
<tr>
<th scope="col">Sr. No.</th>
<th>Seat Name</th>
<th>District Name</th>
<th>Candidate ID</th>


<th>Action</th>
</tr>

@foreach($seats as $index =>$seat)
<tr>
<th scope="row">{{$index + $seats->firstItem()}}</th>

<td>{{$seat->name}}</td>
<td>{{$seat->district['name']}}</td>
<td>{{$seat->candidate_id}}</td>

<td>
    <a href="/seat/{{$seat->id}}/edit"><button class="btn btn-warning">Edit</button></a>
</td>
<form method="POST" action="/seat/{{$seat->id}}/delete">
    @csrf()
    @method('delete')
    <td>
        <button class="btn btn-danger">Delete</button>
    </td> 
    @endforeach
</form>

</table>
{{$seats->links()}}
</div>
</body>
</html>
@endsection