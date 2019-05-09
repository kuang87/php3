<?php


namespace Aleksandr\Action;


use Aleksandr\Hash\HashInterface;
use Aleksandr\Model\User;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class SignInAction
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
                    'login' => ['required', 'alpha_dash'],
                    'password' => ['required', 'min:6'],
                ]);

                $login = $user_data['login'];
                $password = $user_data['password'];

                $user = User::where('login', $login)->first();

                if (!empty($user) && $this->hash->verify($password, $user->password)){
                    header('Location: ' . BASE_URL);
                }
            } catch (ValidationException $exception){
                $errors = $exception->validator->errors();
            }
        }
        return view('sign-in', ['errors' => $errors]);
    }
}