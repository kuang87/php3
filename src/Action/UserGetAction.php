<?php

namespace Aleksandr\Action;


use Aleksandr\Model\User;
use GuzzleHttp\Psr7\ServerRequest;

class UserGetAction
{
    public function __invoke(ServerRequest $request)
    {
        $user = User::find($request->getAttribute('id'));

        return view('user-get', ['user' => $user]);
    }
}