<?php

namespace Fiyo\Mattermost\Request;

/**
 * Class AbstractDeleteRequest
 * @package Fiyo\Mattermost\Request
 */
abstract class AbstractDeleteRequest extends AbstractRequest
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return self::METHOD_DELETE;
    }
}