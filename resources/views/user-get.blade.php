@extends('layout')

@section('title', 'User')

@section('content')

    <ul>
        <li>ID: {{ $user->id }}</li><br>
        <li>Name: {{ $user->name }}</li><br>
        <li>Login: {{ $user->login }}</li>
    </ul>

    <p>Posts</p>
    @foreach($user->posts as $post)
        <ul>
            <li><a href="{{ BASE_URL . 'posts/' . $post->id }}"> {{ $post->title }}</a></li>
        </ul>
    @endforeach

@endsection    