@extends('layout')

@section('title', 'User')

@section('content')
    <h2>Регистрация</h2>
    <form action="" method="post">
        @if($errors->has('name'))
            @foreach($errors->get('name') as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        Имя <input type="text" name="name"><br>

        @if($errors->has('login'))
            @foreach($errors->get('login') as $error)
                    <li>{{ $error }}</li>
            @endforeach
        @endif
        Логин <input type="text" name="login"><br>

        @if($errors->has('email'))
            @foreach($errors->get('email') as $error)
                <li>{{ $error }}</li>
             @endforeach
        @endif
        Email <input type="email" name="email"><br>

        @if($errors->has('password'))
            @foreach($errors->get('password') as $error)
                 <li>{{ $error }}</li>
            @endforeach
        @endif
        Пароль <input type="password" name="password"><br>

        @if($errors->has('password_confirmation'))
            @foreach($errors->get('password_confirmation') as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
            Повторите пароль <input type="password" name="password_confirmation"><br>
        <button>Отправить</button>
    </form>
    <br>
@endsection