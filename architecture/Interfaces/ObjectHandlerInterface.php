<?php

namespace Interfaces;

interface ObjectHandlerInterface
{
    public function __construct();
    public function handleObjects(array $objects): array;

}