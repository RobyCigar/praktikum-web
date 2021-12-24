@extends('posts.layout')

@section('content')
<h2 class="text-center">Edit Post</h2>
<form class="container my-5" enctype="multipart/form-data" action="{{route("posts.update", $post->id)}}" method="POST">
    @method('PUT')
  @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title" value="{{$post->title}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Content</label>
    <input type="text" class="form-control" name="content" value="{{$post->content}}">
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" class="form-control" name="image">
    @if($post->image)
        <img width="400" src="{{asset('storage/image/'.$post->image)}}" alt="File saat ini">
    @endif
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
