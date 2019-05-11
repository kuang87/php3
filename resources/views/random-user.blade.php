@extends('layout')

@section('title', 'RandomUser')

@section('content')

    <p>Random User</p>
    @foreach($user as $key => $value)
        <ul>
            <li>{{ $key . ': ' . $value }}</li>
        </ul>
    @endforeach

@endsection    