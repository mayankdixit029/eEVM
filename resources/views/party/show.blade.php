@extends('layouts.app')
@section('content')

<body>
<table class="table table-bordered">
<tr>
<thead class="thead-dark">
<th>Tag Name </th>
<th>Blog Title</th>
</thead>
</tr>
<tr>
<td>{{$tag->name}}</td>
<td>
@if($tag->blogs->count() > 0)
@foreach($tag->blogs as $blog)
{{$blog->title}} 
@endforeach
@endif
</td>
</tr>
</table>
<br>
<br>

<a href="/category/create"><button class=" btn btn-primary btn-lg " style="margin-left:550px;">Add New Category</button></a>
</body>

</html>

@endsection