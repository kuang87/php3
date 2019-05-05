@extends('layout')

@section('title', 'User')

@section('content')

    <ul>
        <li>{{ $post->title }}</li>
        <li>{{ $post->user->name }}</li>
        <li>{{ $post->content }}</li>
    </ul>
    <p>Category: {{ $post->category->name }}</p>
    <p class="like"><a href="{{BASE_URL. 'posts/' . $post->id . '?like=1'}}">Мне нравится</a></p>
@endsection