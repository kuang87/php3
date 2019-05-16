@extends('layout')

@section('title', 'User')

@section('content')

    <ul>
        <li>{{ $post->title }}</li>
        <li>{{ $post->user->name }}</li>
        <li>{{ $post->content }}</li>
    </ul>
    <p>Category: {{ $post->category->name }}</p>
    <p>Tags:
        @foreach($post->tags as $tag)
            #{{ $tag->name }}
        @endforeach
        </p>
    <p class="like"><a href="{{BASE_URL. 'posts/' . $post->id . '/like'}}">Мне нравится</a></p>

    <p><a href="{{BASE_URL . 'posts/edit/' . $post->id}}">Редактировать</a></p>
@endsection