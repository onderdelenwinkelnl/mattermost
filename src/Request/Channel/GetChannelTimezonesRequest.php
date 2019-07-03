<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Request\AbstractAuthorisedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetChannelTimezonesRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class GetChannelTimezonesRequest extends AbstractAuthorisedGetRequest
{
    const ENDPOINT = '/channels/%s/timezones';

    /**
     * @var string
     */
    protected $channelId;

    /**
     * GetChannelTimezonesRequest constructor.
     * @param string $channelId
     */
    public function __construct(string $channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->channelId);
    }

    /**
     * @param Response $response
     */
    public function handleResponse(Response $response)
    {
        $this->output = json_decode($response->getBody());
    }
}