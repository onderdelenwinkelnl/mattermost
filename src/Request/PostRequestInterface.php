<?php

namespace Fiyo\Mattermost\Request;

/**
 * Interface PostRequestInterface
 * @package Fiyo\Mattermost\Request
 */
interface PostRequestInterface
{
    /**
     * @return array
     */
    public function getContent(): array ;
}