<?php

use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$container = $builder->newInstance();

$container->set(\Aleksandr\Hash\HashInterface::class, function (){
    return new \Aleksandr\Hash\Argon2I();
});

$container->set(\Aleksandr\Action\SignUpAction::class, function () use ($container){
    $hash = $container->get(\Aleksandr\Hash\HashInterface::class);
    $action = new \Aleksandr\Action\SignUpAction($hash);
    return $action;
});
