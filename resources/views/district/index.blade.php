@extends('layouts.app')
@section('content')

<body>

<div class="container" >
    <div class="jumbotron" >
<h1 style="margin-left: 450px;"> <b>All Districts</b></h1><br>

<a href="/district/create"><button style="margin-left:370px;" class=" btn btn-primary mb-2 ">Add New District</button></a>
<table class="table table-dark">
<tr>
                    <th scope="col">Sr.No.</th>
                   
                    <th scope="col">Name of District</th>
                    <th scope="col">Seat Name </th>
                    <th scope="col">State Name </th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    
                    <th scope="col">Actions</th>
</tr>
@foreach($districts as $index=>$district)
<tr>
<th scope="row">{{$index + $districts->firstItem()}}</th>

<td>{{$district->name}}</td>
<td>
{{$district->seat['name']}}
</td>
<td>{{$district->state->name}}</td>
<td>{{$district->created_at->diffForHumans()}}</td>
<td>{{$district->updated_at->diffForHumans()}}</td>


<td>
    <a href="/district/{{$district->id}}/edit"><button class="btn btn-warning">Edit</button></a>
</td>
<td>
<form method="POST" action="/district/{{$district->id}}/delete">
    @csrf()
    @method('delete')
    
        <button class="btn btn-danger">Delete</button> 
    @endforeach
</form>
</td>
</tr>
</table><br><br>
{{$districts->links()}}
</div>
</body>
</html>
@endsection