@extends('layout')

@section('title', 'Users')

@section('content')
    <table>
        <tr>
            <td>Name</td>
            <td>Login</td>
            <td>Date</td>
        </tr>
    @forelse($users as $user)
    <tr>
        <td><a href="{{ BASE_URL . 'users/' . $user->id }}"> {{ $user->name }}</a></td>
        <td><a href="{{ BASE_URL . 'users/' . $user->id }}"> {{ $user->login }}</a></td>
        <td>{{ $user->created_at }}</td>
    </tr>
    @empty
    <tr><p>Нет пользователей</p></tr>
    @endforelse
    </table>
@endsection