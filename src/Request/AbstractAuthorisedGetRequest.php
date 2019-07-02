<?php

namespace Fiyo\Mattermost\Request;

/**
 * Class AbstractAuthorisedGetRequest
 * @package Fiyo\Mattermost\Request
 */
abstract class AbstractAuthorisedGetRequest extends AbstractGetRequest implements AuthenticatedInterface
{
    /**
     * @return array
     */
    public function getParameters(): array
    {
        return [];
    }
}