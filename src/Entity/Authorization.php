<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class Authorization
 * @package Fiyo\Mattermost\Entity
 */
class Authorization
{
    /**
     * @var string
     */
    protected $token;

    /**
     * Authorization constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}