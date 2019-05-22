<?php

namespace Aleksandr\Action;


use Aleksandr\Model\Like;
use Aleksandr\Model\Post;
use Aleksandr\Service\UserAuthentication;
use GuzzleHttp\Psr7\ServerRequest;

class PostLikeAction
{
    public function __invoke(ServerRequest $request)
    {
        if (UserAuthentication::check()) {
            $post = Post::find($request->getAttribute('id'));

            if (!empty($post)) {
                $like = new Like();
                $like->idpost = $post->id;
                $like->iduser = $_SESSION['user']->id;
                $like->isLike = 1;

                try {
                    $like->save();
                    throw new \Exception('ERRRORR');
                } catch (\Exception $exception) {
                    //echo $exception->getMessage();
                    header('Location: ' . BASE_URL . 'posts/' . $post->id);
                }
            }
        }
        return view('post-get', ['post' => $post ?? null]);
    }
}