
@extends('layouts.app')

@section('content')


{{-- --}}

<form  action = "{{route('create_post_path',['thread'=>$thread->id])}}" enctype="multipart/form-data"  method = "POST">

{{csrf_field()}}


<div class = "form-group">
<label for = "title">Title:</label>
<input type = "text" name = "title" class = "form-control" value = "" placeholder = "Title"/>
</div>


<div class = "form-group">
<label for = "comment">Comment:</label>
<textarea rows = "5" name = "comment" class = "form-control" placeholder = "Comment goes here"/></textarea>
</div>

<div class = "form-group">
<input type="file" name="image" accept="image/*" />

</div>

<div class = "form-group">
<button type = "submit" class = "btn btn-primary">Post</button> 
</div>

</form>
<hr>




@if(!empty($thread) )

   {{----}} 

<div class = "panel panel-default">

     <div class = "panel-body">
 <div class = "pull-left">

<img src="/uploads/images/{{$thread->image}}" alt="OP image" class ="img-thumbnail" height = "300" width = "300">
</div>
<h2 class = "text-success">{{$thread->title}}</h2> <br>

  <span class = "text-muted">{{$thread->comment}}</span>
       </div>
</div>

@endif

@foreach($threadPosts as $threadPost)

<div class = "panel panel-default">
  <div class = "panel-body">

@if(!is_null($threadPost->image))
  <div class = "pull-left">


<img src="/uploads/images/{{$threadPost->image}}" alt="OP image" class ="img-thumbnail" height = "300" width = "300">
</div>
@endif 

<h2 class = "text-success">{{$threadPost->title}}</h2><br>
<span class = "text-muted">{{$threadPost->comment}}</span>

  </div>


</div>



@endforeach



@endsection
       