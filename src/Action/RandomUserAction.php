<?php


namespace Aleksandr\Action;

use Aleksandr\Service\Adapter\RandomUserInterface;
use Aleksandr\Service\RandomUser;

class RandomUserAction
{
    private $user;

    public function __construct(RandomUserInterface $adapter)
    {
        $this->user = new RandomUser($adapter);
    }

    public function __invoke()
    {
        $user = $this->user->create();

        return view('random-user', ['user' => $user]);

    }
}