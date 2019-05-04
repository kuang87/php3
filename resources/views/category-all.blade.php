@extends('layout')

@section('title', 'Categories')

@section('content')
    <table>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Posts</td>
        </tr>
    @forelse($categories as $category)
    <tr>
        <td><a href="{{ BASE_URL . 'categories/' . $category->id }}"> {{ $category->id }}</a></td>
        <td><a href="{{ BASE_URL . 'categories/' . $category->id }}"> {{ $category->name }}</a></td>
        <td>
            <ul>
            @foreach($category->posts as $post)
                    <li>{{ $post->title }}</li>
            @endforeach
            </ul>
        </td>
    </tr>
    @empty
    <tr><p>Нет категорий</p></tr>
    @endforelse
    </table>
@endsection