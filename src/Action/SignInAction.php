<?php


namespace Aleksandr\Action;


use Aleksandr\Hash\HashInterface;
use Aleksandr\Service\UserAuthentication;
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

        if (isset($request->getQueryParams()['out'])){
            UserAuthentication::logout();
        }

        if ($request->getMethod() === 'POST'){
            $user_data = $request->getParsedBody();

            try{
                $this->validator->validate($user_data,[
                    'login' => ['required', 'alpha_dash'],
                    'password' => ['required', 'min:6'],
                ]);

                if (UserAuthentication::login($user_data, $this->hash) === false){
                    $errors->add('auth', 'User is not find');
                }
            } catch (ValidationException $exception){
                $errors = $exception->validator->errors();
            }
        }
        return view('sign-in', ['errors' => $errors]);
    }
}