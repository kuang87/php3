<?php


namespace Aleksandr\Hash;


class BCrypt implements HashInterface
{
    const OPTION_SALT = 'salt';
    const OPTION_COST = 'cost';

    public static function hash(string $password, array $options = [])
    {
        if (!empty($options)){
            foreach ($options as $option){
                if (!in_array($option, [self::OPTION_SALT, self::OPTION_COST])){
                    throw new \Exception('Wrong parameters');
                }
            }
        }
        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public static function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}