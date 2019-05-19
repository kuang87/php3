<?php


namespace Aleksandr\Action;


use Aleksandr\Model\Post;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class PostEditAction
{
    private $validator;

    public function __construct($validator)
    {
        $this->validator = $validator;
    }

    public function __invoke(ServerRequest $request)
    {
        $errors = new MessageBag();

            $post = Post::find($request->getAttribute('id'));

        if ($request->getMethod() === 'POST'){
            $post_data = $request->getParsedBody();

            try{
                $this->validator->validate($post_data,[
                    'title' => ['required', 'alpha_dash'],
                    'content' => ['required']
                ]);

                $post->title = $post_data['title'];
                $post->content = $post_data['content'];
                $post->author = 1;
                $post->category_id = $post_data['postcategory'];
                $post->save();
                header('Location: ' . BASE_URL . 'posts');

            } catch (ValidationException $exception){
                $errors = $exception->validator->errors();
            }
        }
        return view('post-edit', ['errors' => $errors, 'post' => $post ?? '']);
    }
}