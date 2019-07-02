<?php

namespace Fiyo\Mattermost\Request;

use GuzzleHttp\Psr7\Response;

/**
 * Interface RequestInterface
 * @package Fiyo\Mattermost\Request
 */
interface RequestInterface
{
    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @return string
     */
    public function getEndpoint(): string;

    /**
     * @param Response $response
     * @return void
     */
    public function handleResponse(Response $response);

    /**
     * @return mixed
     */
    public function getOutput();
}