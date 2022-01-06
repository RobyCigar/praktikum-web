@extends('layout.index')

@section('title')
    Form Anime
@endsection



@section('content')
<div class="mx-5 my-5">
    <a href="{{route('anime.index')}}" class="btn btn-primary">Kembali</a>
    <form action="{{route('anime.store')}}" method="POST">
        @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <input name="description" type="text" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
@endsection