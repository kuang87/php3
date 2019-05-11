<?php


namespace Aleksandr\Service\Adapter;


use KielD01\RandomUser\RandomUser;

class KielD01RandomUserAdapter implements RandomUserInterface
{
    private $user;

    public function __construct(RandomUser $randomuser)
    {
        $this->user = $randomuser;
    }

    public function generate()
    {
        $user_data = $this->user->setResultsCount(1)->fetch()->getResults()->items[0];
        $user['first_name'] = $user_data->name->first;
        $user['second_name'] = $user_data->name->last;
        $user['gender'] = $user_data->gender;
        $user['city'] = $user_data->location->city;
        $user['email'] = $user_data->email;
        $user['login'] = $user_data->login->username;
        $user['age'] = $user_data->dob->age;
        $user['phone'] = $user_data->phone;
        return $user;
    }
}