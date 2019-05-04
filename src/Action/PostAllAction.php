<?php


namespace Aleksandr\Action;

use Aleksandr\Model\Post;
use GuzzleHttp\Psr7\ServerRequest;

class PostAllAction
{
    public function __invoke(ServerRequest $request)
    {
        $posts = Post::all();
        return view('post-all', ['posts' => $posts]);
    }
}