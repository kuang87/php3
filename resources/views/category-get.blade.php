@extends('layout')

@section('title', 'Category')

@section('content')

    <h2>{{$category->name}}</h2>

    <ul>
        @foreach($category->posts as $post)
            <li><a href="{{ BASE_URL . 'posts/' . $post->id }}">{{ $post->created_at}} | {{$post->title }}</a></li>
        @endforeach
    </ul>


@endsection