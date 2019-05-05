<?php

namespace Aleksandr\Action;


use Aleksandr\Model\Like;
use Aleksandr\Model\Post;
use GuzzleHttp\Psr7\ServerRequest;

class PostGetAction
{
    public function __invoke(ServerRequest $request)
    {
        $like = $request->getQueryParams()['like']  ?? '';
        if ($like){
            Like::postLike($like);
        }

        $post = Post::find($request->getAttribute('id'));

        return view('post-get', ['post' => $post]);
    }
}