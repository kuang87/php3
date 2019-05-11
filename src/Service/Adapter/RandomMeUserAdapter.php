<?php


namespace Aleksandr\Service\Adapter;


class RandomMeUserAdapter implements RandomUserInterface
{
    private $json;

    public function __construct()
    {
        $url = 'https://randomuser.me/api';
        $json = '';

        try {
            $json = @file_get_contents($url);
            if ($json === false) {
                throw new Exception("Ошибка чтения!!!");
            }
        } catch (Exception $e) {
            echo 'ОШИБКА: ' . $e->getMessage();
        }
        $this->json = $json;
    }

    public function generate()
    {
        $user_data = json_decode($this->json, true)['results'][0];
        $user['first_name'] = $user_data['name']['first'];
        $user['second_name'] = $user_data['name']['last'];
        $user['gender'] = $user_data['gender'];
        $user['city'] = $user_data['location']['city'];
        $user['email'] = $user_data['email'];
        $user['login'] = $user_data['login']['username'];
        $user['age'] = $user_data['dob']['age'];
        $user['phone'] = $user_data['phone'];
        return $user;
    }
}