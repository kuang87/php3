@extends('layout')

@section('title', 'User')

@section('content')
    <h2>Регистрация</h2>
    <form action="" method="post">
        Имя <input type="text" name="name"><br>
        Логин <input type="text" name="login"><br>
        Email <input type="email" name="email"><br>
        Пароль <input type="password" name="pass"><br>
        Повторите пароль <input type="password" name="passConfirm"><br>
        <button>Отправить</button>
    </form>
    <br>
    @forelse($errors as $err)
        <li>{{$err}}</li>
    @empty

    @endforelse
@endsection