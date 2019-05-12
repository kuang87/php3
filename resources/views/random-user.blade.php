@extends('layout')

@section('title', 'RandomUser')

@section('content')

    <p>Random Users</p>
    @foreach($users as $user)
        <ul class="random_user">
        @foreach($user as $key => $value)
            @if($key == 'image')
                <img src="{{$value}}">
            @else
                <li>{{ $key . ': ' . $value }}</li>
            @endif
        @endforeach
        </ul>
    @endforeach

@endsection    