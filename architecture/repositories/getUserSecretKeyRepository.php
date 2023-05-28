<?php

namespace repositories;

class getUserSecretKeyRepository implements \getUserSecretKeyRepositoryInterface
{

    public function getUserSecretKeyFromDB(): string
    {
        //query in DB
        return '123456789';
    }

    public function getUserSecretKeyFromRedis(): string
    {
        //query in Redis
        return '123456789';
    }
}