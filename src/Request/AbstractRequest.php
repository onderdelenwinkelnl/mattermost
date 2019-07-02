<?php

namespace Fiyo\Mattermost\Request;

/**
 * Class AbstractRequest
 * @package Fiyo\Mattermost\Request
 */
abstract class AbstractRequest implements RequestInterface
{
    const METHOD_GET    = 'GET';
    const METHOD_POST   = 'POST';
    const METHOD_PUT    = 'PUT';
    const METHOD_PATCH  = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    /**
     * @var mixed
     */
    protected $output;

    /**
     * @return mixed
     */
    public function getOutput()
    {
        return $this->output;
    }
}