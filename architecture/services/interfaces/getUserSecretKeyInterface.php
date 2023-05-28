<?php

namespace services\interfaces;

interface getUserSecretKeyInterface
{
    public function getUserSecretKeyFromFile(): string;

    public function getUserSecretKeyFromDB(): string;

    public function getUserSecretKeyFromRedis(): string;

    public function getUserSecretKeyFromCloud(): string;

}