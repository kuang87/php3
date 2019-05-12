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
        $users = $this->user->create(5);
        return view('random-user', ['users' => $users]);
    }
}