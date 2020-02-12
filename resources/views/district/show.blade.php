@extends('layouts.app')
@section('content')

<body>


<div class="jumbotron" style="background-color:#ccebff; margin: 10px 50px 75px 100px;">
<h1 style="margin-left: 450px;"><b>Blog Details</b></h1><br>
<table class="table table-bordered">
<tr>
<thead class="thead-dark">
<th>Title </th>
<th>Description</th>
<th>Category ID</th>
<th>Category Name</th>
<th>Tag Name</th>
</thead>
</tr>

<tr>
<td>{{$blog->title}}</td>
<td>{{$blog->description}}</td>
<td>{{$blog->category_id}}</td>
<td>{{$blog->category->name}}</td>
<td>
@if($blog->tags->count()>0)
@foreach($blog->tags as $tag)
#{{$tag->name}}<br>
@endforeach
@else
No Tag Available
@endif
</td>
</tr>

</table><br>
<a href="/blog/create"><button style="margin-left: 475px;" class=" btn btn-primary btn-lg">Add Another Blog</button></a><br>
<br>

<form action="/blog/{{$blog->id}}/storecomment" method="POST">
@csrf()
@method('put')
<div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Comments</span>
  </div>
  <textarea class="form-control" name="comment"  aria-label="With textarea"></textarea>
</div><br>
<input style="margin-left: 5px;" class="btn btn-primary btn-lg" type="submit"  value="Submit">
</form>
<br>
<br>

<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Comments</th>
    <th>Created By</th>
    <th>Created_At</th>
</tr>

    
     @foreach($blog->comments as $comment)
<tr>  
    <td>{{$comment->id}}</td>
    <td>{{$comment->comment}}</td>
    <td>{{$comment->user->name}}</td>
    <td>{{$comment->created_at->diffForHumans()}}</td>
</tr>

    @endforeach 
    
   

</tr>
</table>
<br>
<br>


</div>
</body>

</html>
@endsection
