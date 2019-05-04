<?php


namespace Aleksandr\Action;

use Aleksandr\Model\User;
use GuzzleHttp\Psr7\ServerRequest;

class UserAllAction
{
    public function __invoke(ServerRequest $request)
    {
        $users = User::all();
        return view('user-all', ['users' => $users]);
    }
}