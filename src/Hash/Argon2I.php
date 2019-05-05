<?php


namespace Aleksandr\Hash;


class Argon2I implements HashInterface
{
    const MEMORY_COST = 'memory_cost';
    const TIME_COST = 'time_cost';
    const THREADS = 'threads';


    public static function hash(string $password, array $options = [])
    {
        if (!empty($options)){
            foreach ($options as $option){
                if (!in_array($option, [self::MEMORY_COST, self::TIME_COST, self::THREADS])){
                    throw new \Exception('Wrong parameters');
                }
            }
        }
        return password_hash($password, PASSWORD_ARGON2I, $options);
    }

    public static function verify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}