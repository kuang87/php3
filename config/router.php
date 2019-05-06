<?php

$routerContainer = new \Aura\Router\RouterContainer();
$router = $routerContainer->getMap();

$router->get('home', '/', Aleksandr\Action\HomeAction::class);
$router->get('user.get', '/users/{id}', Aleksandr\Action\UserGetAction::class);
$router->get('user.all', '/users', Aleksandr\Action\UserAllAction::class);
$router->get('post.all', '/posts', Aleksandr\Action\PostAllAction::class);
$router->get('post.get', '/posts/{id}', Aleksandr\Action\PostGetAction::class);
$router->get('category.all', '/categories', Aleksandr\Action\CategoryAllAction::class);
$router->get('category.get', '/categories/{id}', Aleksandr\Action\CategoryGetAction::class);
$router->get('sign-up.get', '/sign-up', Aleksandr\Action\SignUpAction::class);
$router->post('sign-up.post', '/sign-up', Aleksandr\Action\SignUpAction::class);
$router->get('post.like', '/posts/{id}/like', Aleksandr\Action\PostLikeAction::class);
