<?php


namespace Aleksandr\Action;


use Aleksandr\Hash\Argon2I;
use Aleksandr\Hash\HashInterface;
use Aleksandr\Model\User;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class SignUpAction
{
    //protected $errors = [];
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
        //$user_data = $request->getParsedBody() ?? '';
        //if (!empty($user_data)){
        //    foreach ($user_data as $field){
        //       if ($field == ''){
        //            $this->errors[] = 'Заполните все поля';
        //        }
        //    }
        //    if ($user_data['pass'] != $user_data['passConfirm']){
        //        $this->errors[] = 'Не совпадают пароли';
        //    }

        //    if (count($this->errors) == 0){
        //        $user = new User();
        //        $user->name = $user_data['name'];
        //        $user->login = $user_data['login'];
        //        $user->password = $this->hash->hash($user_data['pass']);
        //        $user->save();
        //        header('Location: ' . BASE_URL);
        //    }
        //}
        return view('sign-up', ['errors' => $errors]);
    }
}