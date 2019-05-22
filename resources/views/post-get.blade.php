@extends('layout')

@section('title', 'User')

@section('content')

    @isset($post)
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
        <p class="like">
            <a href="{{BASE_URL. 'posts/' . $post->id . '/like'}}">
                Мне нравится <img src="{{BASE_URL. 'static/img/likebtn.png'}}"></a>
            {{\Aleksandr\Model\Like::where('idpost', $post->id)->where('isLike', 1)->count()}}
        </p>

        <p><a href="{{BASE_URL . 'posts/edit/' . $post->id}}">Редактировать</a></p>
    @endisset
@endsection