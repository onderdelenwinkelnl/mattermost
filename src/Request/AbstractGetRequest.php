<?php


namespace Fiyo\Mattermost\Request;

/**
 * Class AbstractGetRequest
 * @package Fiyo\Mattermost\Request
 */
abstract class AbstractGetRequest extends AbstractRequest implements GetRequestInterface
{
    /**
     * @return string
     */
    public function getMethod(): string
    {
        return self::METHOD_GET;
    }
}