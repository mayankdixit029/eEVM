@extends('layouts.app')
@section('content')

<body>

<div class="container" >
    <div class="jumbotron" >
<h1 style="margin-left: 450px;"> <b>All Candidates</b></h1><br>

<a href="/candidate/create"><button style="margin-left:370px;" class=" btn btn-primary mb-2 ">Add New Candidates</button></a>
<table class="table table-dark">
<tr>
                    <th scope="col">Sr.No.</th>
                   
                    <th scope="col">Name of Candidate</th>
                    <th scope="col">Seat Name </th>
                    <th scope="col">Party Name </th>
                    <th scope="col">Party Symbol </th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">No. of Votes</th>
                    <th scope="col">Actions</th>
</tr>
@foreach($candidates as $index=>$candidate)
<tr>
<th scope="row">{{$index + $candidates->firstItem()}}</th>

<td>{{$candidate->name}}</td>
<td>{{$candidate->seat['name']}}</td>
<td>{{$candidate->party['name']}}</td>

<td>

                     @if($candidate->party->image)
                            <img class="img-thumbnail" src="{{asset($candidate->party->image)}}" width="100px" height="auto" >
                            @else
                            No Image
                            @endif
                             </td>

<td>{{$candidate->created_at->diffForHumans()}}</td>
<td>{{$candidate->updated_at->diffForHumans()}}</td>
<td>{{$candidate->count}}</td>


<td>
    <a href="/candidate/{{$candidate->id}}/edit"><button class="btn btn-warning">Edit</button></a>
</td>
<td>
<form method="POST" action="/candidate/{{$candidate->id}}/delete">
    @csrf()
    @method('delete')
    
        <button class="btn btn-danger">Delete</button> 
    @endforeach
</form>
</td>
</tr>
</table><br><br>
{{$candidates->links()}}
</div>
</body>
</html>
@endsection