<?php

namespace Fiyo\Mattermost\Request;

/**
 * Class AbstractPostRequest
 * @package Fiyo\Mattermost\Request
 */
abstract class AbstractPostRequest extends AbstractRequest implements PostRequestInterface
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return self::METHOD_POST;
    }
}