<?php

use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$container = $builder->newInstance();

$container->set('hash', function () use ($container){
    $action = new \Aleksandr\Action\SignUpAction(new \Aleksandr\Hash\Argon2I());
    return $action;
});