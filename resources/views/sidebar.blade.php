<div id="sidebar">
<div>
    Разделы
    <ul>
        <li><a href="{{BASE_URL}}users">Пользователи</a></li>
        <li><a href="{{BASE_URL}}posts">Статьи</a></li>
        <li><a href="{{BASE_URL}}random-user">Cлучайные пользователи</a>
        <li><a href="{{BASE_URL}}categories">Категории</a>
        <ul id="categories">
        @foreach(Aleksandr\Model\Category::all() as $cat_name)
                <li><a href="{{ BASE_URL . 'categories/' . $cat_name->id }}">{{$cat_name->name}}</a></li>
        @endforeach
        </ul>
        </li>
    </ul>
</div>
<div id="sign-in">
    @if(\Aleksandr\Service\UserAuthentication::check())
        <a href="{{BASE_URL}}sign-in?out">Выход</a>
    @else
        <a href="{{BASE_URL}}sign-up">Зарегистрироваться</a><br>
        <a href="{{BASE_URL}}sign-in">Войти</a>
    @endif
</div>
</div>