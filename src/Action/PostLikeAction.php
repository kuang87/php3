<?php

namespace Aleksandr\Action;


use Aleksandr\Model\Like;
use Aleksandr\Model\Post;
use GuzzleHttp\Psr7\ServerRequest;

class PostLikeAction
{
    public function __invoke(ServerRequest $request)
    {
        $post = Post::find($request->getAttribute('id'));

        $like = new Like();
        $like->idpost = $post->id;
        $like->iduser = 1;
        $like->isLike = 1;

        try{
            $like->save();
        } catch (\Exception $exception){
            header('Location: ' . BASE_URL . 'posts/' . $post->id);
        }

        return view('post-get', ['post' => $post]);
    }
}