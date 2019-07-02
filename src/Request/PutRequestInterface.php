<?php

namespace Fiyo\Mattermost\Request;

/**
 * Interface PutRequestInterface
 * @package Fiyo\Mattermost\Request
 */
interface PutRequestInterface
{
    /**
     * @return array
     */
    public function getContent(): array ;
}