<?php

namespace Aleksandr\Action;


use Aleksandr\Model\Post;
use GuzzleHttp\Psr7\ServerRequest;

class PostGetAction
{
    public function __invoke(ServerRequest $request)
    {
        $post = Post::find($request->getAttribute('id'));

        return view('post-get', ['post' => $post]);
    }
}