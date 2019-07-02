<?php

namespace Fiyo\Mattermost\Request;

/**
 * Class AbstractPutRequest
 * @package Fiyo\Mattermost\Request
 */
abstract class AbstractPutRequest extends AbstractRequest implements PutRequestInterface
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return self::METHOD_PUT;
    }
}