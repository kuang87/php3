<?php

use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$container = $builder->newInstance();

$container->set('validator', function () use($capsule){
    $loader = new \Illuminate\Translation\FileLoader(new \Illuminate\Filesystem\Filesystem(), dirname(dirname(__FILE__)) . '/resources/lang');
    $loader->addNamespace('lang', dirname(dirname(__FILE__)) . '/resources/lang');
    $loader->load($lang = 'ru', $group = 'validation', $namespace = 'lang');

    $factory = new \Illuminate\Translation\Translator($loader, 'ru');
    $validator = new \Illuminate\Validation\Factory($factory);

    $verifier = new \Illuminate\Validation\DatabasePresenceVerifier($capsule->getDatabaseManager());
    $validator->setPresenceVerifier($verifier);

    return $validator;
});

$container->set(\Aleksandr\Hash\HashInterface::class, function (){
    return new \Aleksandr\Hash\Argon2I();
});

$container->set(\Aleksandr\Action\SignUpAction::class, function () use ($container){
    $hash = $container->get(\Aleksandr\Hash\HashInterface::class);
    $validator = $container->get('validator');
    $action = new \Aleksandr\Action\SignUpAction($hash, $validator);
    return $action;
});
