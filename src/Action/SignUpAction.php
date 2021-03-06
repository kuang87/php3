<?php


namespace Aleksandr\Action;


use Aleksandr\Hash\HashInterface;
use Aleksandr\Model\User;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class SignUpAction
{
    private $hash;
    private $validator;

    public function __construct(HashInterface $hash, $validator)
    {
        $this->hash = $hash;
        $this->validator = $validator;
    }

    public function __invoke(ServerRequest $request)
    {
        $errors = new MessageBag();

        if ($request->getMethod() === 'POST'){
            $user_data = $request->getParsedBody();

            try{
                $this->validator->validate($user_data,[
                    'name' => ['required', 'alpha_dash'],
                    'login' => ['required', 'alpha_dash', 'unique:users,login'],
                    'email' => ['required', 'email'],
                    'password' => ['required', 'min:6', 'confirmed'],
                    'password_confirmation' => ['required', 'min:6']
                ]);

                $user = new User();
                $user->name = $user_data['name'];
                $user->login = $user_data['login'];
                $user->password = $this->hash->hash($user_data['password']);
                $user->save();
                header('Location: ' . BASE_URL);

            } catch (ValidationException $exception){
                $errors = $exception->validator->errors();
            }
        }
        return view('sign-up', ['errors' => $errors]);
    }
}