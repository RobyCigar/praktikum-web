@extends('posts.layout')

@section('content')
<h2 class="text-center">Post Detail</h2>
<div class="container card">
    <h2 class="text-center">
        {{$post->title}}
    </h2>
    <div class="mx-auto">
        <img width="300" src="{{asset('storage/image/'.$post->image)}}" alt="Foto post">
    </div>
    <p>
        {{$post->content}}
    </p>
</div>
@endsection

