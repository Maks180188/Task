<?php

namespace services;

use getUserSecretKeyRepositoryInterface;
use services\interfaces\getUserSecretKeyInterface;

class getUserSecretKeyService implements getUserSecretKeyInterface
{
    public function __construct(private readonly getUserSecretKeyRepositoryInterface $getUserSecretKeyRepository)
    {
    }

    public function getUserSecretKeyFromFile(): string
    {
        //business logic
        return '123456789';
    }

    public function getUserSecretKeyFromDB(): string
    {
        //business logic
        return $this->getUserSecretKeyRepository->getUserSecretKeyFromDB();
    }

    public function getUserSecretKeyFromRedis(): string
    {
        //business logic
        return $this->getUserSecretKeyRepository->getUserSecretKeyFromRedis();
    }

    public function getUserSecretKeyFromCloud(): string
    {
        //business logic
        return '123456789';
    }
}