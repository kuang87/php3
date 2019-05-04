<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{BASE_URL}}static/css/style.css">
    <title>
        @hasSection ('title')
            @yield('title')
        @else
            Blog
        @endif
    </title>
</head>

<body>
<div id="wrapper">
    <div id="header">Блог</div>

        @include('sidebar')

    <div id="content">
        @yield('content')
    </div>

    <div class="clear"></div>

    <div id="footer">
        <p>&copy; Untitled. {{date('Y')}}</p>
    </div>
</div>
</body>
</html>