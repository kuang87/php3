<?php

namespace Aleksandr\Action;


use GuzzleHttp\Psr7\ServerRequest;

class HomeAction
{
    public function __invoke(ServerRequest $request)
    {
        return view('index');
    }
}