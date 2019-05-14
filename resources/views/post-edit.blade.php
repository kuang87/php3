@extends('layout')

@section('title', 'Post edit')

@section('content')

    <form action="" method="post">
        Title: <input type="text" name="title" value="{{ $post->title }}">
        <br>
        Text: <br>
        <textarea name="content">{{ $post->content }}</textarea>
        <p>Author: {{ $post->user->name }}</p>
    <p>Category: {{ $post->category->name }}</p>
    <p>Tags:
        @foreach($post->tags as $tag)
            #{{ $tag->name }}
        @endforeach
        </p>
        <button>Save</button>
    </form>
@endsection