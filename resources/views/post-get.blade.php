@extends('layout')

@section('title', 'User')

@section('content')

    <ul>
        <li>{{ $post->title }}</li>
        <li>{{ $post->user->name }}</li>
        <li>{{ $post->content }}</li>
    </ul>
    <p>Category: {{ $post->category->name }}</p>

@endsection    