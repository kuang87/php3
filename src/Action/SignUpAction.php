<?php


namespace Aleksandr\Action;


use Aleksandr\Hash\Argon2I;
use Aleksandr\Hash\HashInterface;
use Aleksandr\Model\User;
use GuzzleHttp\Psr7\ServerRequest;

class SignUpAction
{
    protected $errors = [];
    private $hash;

    public function __construct(HashInterface $hash)
    {
        $this->hash = $hash;
    }

    public function __invoke(ServerRequest $request)
    {
        $user_params = $request->getParsedBody() ?? '';
        if (!empty($user_params)){
            foreach ($user_params as $field){
               if ($field == ''){
                    $this->errors[] = 'Заполните все поля';
                }
            }
            if ($user_params['pass'] != $user_params['passConfirm']){
                $this->errors[] = 'Не совпадают пароли';
            }

            if (count($this->errors) == 0){
                $user = new User();
                $user->name = $user_params['name'];
                $user->login = $user_params['login'];
                $user->password = $this->hash->hash($user_params['pass']);
                $user->save();
                header('Location: ' . BASE_URL);
            }
        }
        return view('sign-up', ['errors' => $this->errors]);
    }
}