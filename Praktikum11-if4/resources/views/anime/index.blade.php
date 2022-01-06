@extends('layout.index')

@section('title')
    Daftar Anime
@endsection



@section('content')
<div class="my-5 mx-5">
    <a class="btn btn-primary" href="{{route('anime.create')}}">Tambahkan data</a>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($animes as $anime)
        <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$anime->title}}</td>
        <td>{{$anime->description}}</td>
        <td>
            <a href="{{route('anime.edit',$anime->id)}}" class="btn btn-primary">Edit</a>
            <form action="{{route('anime.destroy',$anime->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        </tr>
        <tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection