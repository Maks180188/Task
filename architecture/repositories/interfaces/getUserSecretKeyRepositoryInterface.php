<?php

interface getUserSecretKeyRepositoryInterface
{
    public function getUserSecretKeyFromDB(): string;

    public function getUserSecretKeyFromRedis(): string;

}