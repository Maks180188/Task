<?php

use services\interfaces\getUserSecretKeyInterface;

class User
{
    public function __construct(private readonly getUserSecretKeyInterface $getUserSecretKey)
    {
    }

    public function getUserSecretKey(): string
    {
        //here we can choose any way to get user secret key
        return $this->getUserSecretKey->getUserSecretKeyFromDB();
    }

    public function getUserData(): array
    {
        $get = array(
            'key' => $this->getUserSecretKey(),
            'email' => 'mail@example.com'
        );

        $ch = curl_init('https://example.com?' . http_build_query($get));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $userData = curl_exec($ch);
        curl_close($ch);

        return ['data' => $userData];
    }

}