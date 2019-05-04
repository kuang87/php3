@extends('layout')

@section('title', 'Posts')

@section('content')
    <table>
        <tr>
            <td>Title</td>
            <td>Content</td>
            <td>Date</td>
            <td>Author</td>
            <td>Category</td>
        </tr>
    @forelse($posts as $post)
    <tr>
        <td><a href="{{ BASE_URL . 'posts/' . $post->id }}"> {{ $post->title }}</a></td>
        <td><a href="{{ BASE_URL . 'posts/' . $post->id }}"> {{ $post->content }}</a></td>
        <td>{{ $post->created_at }}</td>
        <td>{{ $post->user->name }}</td>
        <td>{{ $post->category->name }}</td>
    </tr>
    @empty
    <tr><p>Нет статей</p></tr>
    @endforelse
    </table>
@endsection