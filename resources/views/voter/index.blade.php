@extends('layouts.app')
@section('content')

<body>
<div class="container">
    <div class="jumbotron">
    <h1  style="margin-left: 460px;"><b>Please Vote </b></h1><br>

<table class="table table-dark">
<tr>

<th>Candidate Name</th>
<th>Party Name</th>
<th>Seat No.</th>
<th>Candidate Symbol</th>

<th>Vote Button</th>
</tr>
@foreach($candidates as $candidate)
@if($candidate->seat_id==Auth::user()->district_id)
<tr>
<td>{{$candidate->name}}</td>
<td>{{$candidate->party->name}}</td>
<td>{{$candidate->seat_id}}</td>
<td>

                            @if($candidate->party->image)
                            <img class="img-thumbnail" src="{{asset($candidate->party->image)}}" width="100px" height="auto" >
                            @else
                            No Image
                            @endif
                             </td>


 <td>
 <form action="voter/{{$candidate->id}}/save_vote" method="POST">
@csrf
 
    <button type="submit" class="btn btn-warning">Voting Button</button>
</form> 
</td>
</tr>
@endif
@endforeach


</table>
</form>
</div>
</body>
</html>
@endsection