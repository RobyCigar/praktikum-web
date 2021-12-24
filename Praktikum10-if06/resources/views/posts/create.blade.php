@extends('posts.layout')

@section('content')
<h2 class="text-center">Create Post</h2>
<form class="container my-5" action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="mb-3">
    <label class="form-label">Content</label>
    <input type="text" class="form-control" name="content">
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" class="form-control" name="image">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

