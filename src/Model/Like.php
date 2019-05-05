<?php


namespace Aleksandr\Model;


class Like
{
    public static function postLike($isLike){
        if ($isLike === '1'){
            echo 'Like';
            exit;
        }
    }
}