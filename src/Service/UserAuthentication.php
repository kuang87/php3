<?php


namespace Aleksandr\Service;


use Aleksandr\Hash\HashInterface;
use Aleksandr\Model\User;

class UserAuthentication
{
    public static function login($user_data = [], HashInterface $hash)
    {
        $login = $user_data['login'];
        $password = $user_data['password'];

        $user = User::where('login', $login)->first();

        if (!empty($user) && $hash->verify($password, $user->password)){
            $_SESSION['auth'] = 1;
            $_SESSION['user'] = $user;
            header('Location: ' . BASE_URL);
        }
        else{
            return false;
        }
    }

    public static function logout()
    {
        if(!empty($_SESSION['auth'])){
            unset($_SESSION['auth']);
            unset($_SESSION['user']);
        }
        return true;
    }

    public static function check()
    {
        if(!empty($_SESSION['auth'])){
            return true;
        }
        return false;
    }
}