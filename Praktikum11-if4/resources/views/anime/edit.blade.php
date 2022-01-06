@extends('layout.index')

@section('title')
    Edit Anime
@endsection



@section('content')
<div class="mx-5 my-5">
    <a href="{{route('anime.index')}}" class="btn btn-primary">Kembali</a>
    <form action="{{route('anime.update', $anime->id)}}" method="POST">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input value={{$anime->title}} name="title" type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input value={{$anime->description}}  name="description" type="text" class="form-control">
    </div>
    <button type="submit" class="btn btn-warning">Edit Data</button>
    </form>
</div>
@endsection