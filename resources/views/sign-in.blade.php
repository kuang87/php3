@extends('layout')

@section('title', 'User')

@section('content')
    <h2>Регистрация</h2>
    <form action="" method="post">
        @if($errors->has('login'))
            @foreach($errors->get('login') as $error)
                    <li>{{ $error }}</li>
            @endforeach
        @endif
        Логин <input type="text" name="login"><br>

        @if($errors->has('password'))
            @foreach($errors->get('password') as $error)
                 <li>{{ $error }}</li>
            @endforeach
        @endif
        Пароль <input type="password" name="password"><br>

        @if($errors->has('auth'))
            @foreach($errors->get('auth') as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
            <button>Войти</button>
    </form>
    <br>
@endsection