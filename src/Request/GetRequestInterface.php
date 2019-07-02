<?php


namespace Fiyo\Mattermost\Request;

/**
 * Interface GetRequestInterface
 * @package Fiyo\Mattermost\Request
 */
interface GetRequestInterface
{
    /**
     * @return array
     */
    public function getParameters(): array;
}