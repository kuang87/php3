@extends('layout')

@section('title', 'Post edit')

@section('content')

    <form action="" method="post">
        Title: <input type="text" name="title" value="{{ $post->title }}">
        <br>
        Text: <br>
        <textarea name="content">{{ $post->content }}</textarea>
        <p>Author: {{ $post->user->name }}</p>
    <p>Category:
        <select name="postcategory">
            @foreach(Aleksandr\Model\Category::all() as $cat_name)
                @if($cat_name->name === $post->category->name)
                    <option selected value="{{$cat_name->id}}">{{$cat_name->name}}</option>
                @else
                    <option value="{{$cat_name->id}}">{{$cat_name->name}}</option>
                @endif
            @endforeach
        </select>
    </p>
    <p>Tags:
        @foreach($post->tags as $tag)
            #{{ $tag->name }}
        @endforeach
        </p>
        <button>Save</button>
    </form>
@endsection