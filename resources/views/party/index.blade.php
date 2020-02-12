@extends('layouts.app')
@section('content')

<body>
<div class="container">
    <div class="jumbotron">
    <h1  style="margin-left: 460px;"><b>All Parties</b></h1><br>
<a href="/party/create"><button style="margin-left: 660px;"class=" btn btn-primary mb-2 ">Add New Party</button></a>
<table class="table table-dark">
<tr>
<th scope="col">Sr. No.</th>
<th>Party Name</th>
<th>Party Symbol</th>
<th>Action</th>
</tr>

@foreach($parties as $index =>$party)
<tr>
<th scope="row">{{$index + $parties->firstItem()}}</th>
<td>{{$party->name}}</td>
<td>
                            @if($party->image)
                            <img class="img-thumbnail" src="{{asset($party->image)}}" width="100px" height="auto" >
                            @else
                            No Image
                            @endif
                        </td>
<td>
    <a href="/party/{{$party->id}}/edit"><button class="btn btn-warning">Edit</button></a>
</td>
<td>
<form method="POST" action="/party/{{$party->id}}/delete">
    @csrf()
    @method('delete')
   
        <button class="btn btn-danger">Delete</button>
  
    @endforeach
</form>
</td> 
</table>
{{$parties->links()}}
</div>
</body>
</html>
@endsection