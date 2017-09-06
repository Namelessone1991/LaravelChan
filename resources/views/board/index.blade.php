@extends('layouts.app')

@section('content')

<form action = "{{route('store_thread_path')}}" enctype="multipart/form-data"  method = "POST">

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

 {{-- <img src="" alt="OP image" height="42" width="42"> --}}




   





@endsection