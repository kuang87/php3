<?php
DEFINE('BASE_URL', '/');

require_once '../vendor/autoload.php';

require_once '../config/dotenv.php';
require_once '../config/database.php';
require_once '../config/view.php';
require_once '../config/router.php';


$serverRequest = \GuzzleHttp\Psr7\ServerRequest::fromGlobals();
$matcher = $routerContainer->getMatcher();


if ($action = $matcher->match($serverRequest)){
    foreach ($action->attributes as $name => $attribute){
        $serverRequest = $serverRequest->withAttribute($name, $attribute);
    }

    $action = new $action->handler;

    $response = new \GuzzleHttp\Psr7\Response();
    $response->getBody()->write(call_user_func($action, $serverRequest));
    echo $response->getBody();
}


//echo $blade->make('layout');


//
//$user = \Aleksandr\Model\User::find(1);
//
//var_dump($user);

//DEFINE('BASE_URL', '/');
//
//require_once 'vendor/autoloader.php';
//
//use Aleksandr\System\Router;
//use Aleksandr\Action\HomeAction;
//use Aleksandr\Action\SignInAction;
//use Aleksandr\Action\SignUpAction;
//use Aleksandr\Action\Logout;
//use Aleksandr\Action\User\ReadUserAction;
//use Aleksandr\Action\User\AllUsersAction;
//use Aleksandr\Action\User\MyCV;
//use Aleksandr\Action\User\UserProfile;
//
//
//session_start();
//
//
//Router::add('home#permit', ['GET'], '/', [], HomeAction::class);
//Router::add('sign-in#permit', ['GET', 'POST'], '/sign-in', [], SignInAction::class);
//Router::add('sign-up#permit', ['GET', 'POST'], '/sign-up', [], SignUpAction::class);
//Router::add('logout#permit', ['GET'], '/logout', [], Logout::class);
//
//Router::add('user.read', ['GET'], '/users/{id}', ['{id}' => '[0-9]+'], ReadUserAction::class);
//Router::add('user.all.read', ['GET'], '/users', [], AllUsersAction::class);
//Router::add('cv.update', ['GET'], '/mycv', [], MyCV::class);
//Router::add('profile.update', ['GET'], '/profile', [], UserProfile::class);
//
//
//echo Router::match($_SERVER['REQUEST_URI']);
