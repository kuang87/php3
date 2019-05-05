<?php


namespace Aleksandr\Hash;


interface HashInterface
{
    public static function hash(string $password, array $options = []);

    public static function verify(string $password, string $hash): bool;
}