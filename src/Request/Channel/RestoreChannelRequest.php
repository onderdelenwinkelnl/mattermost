<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPostRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class RestoreChannelRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class RestoreChannelRequest extends AbstractAuthorisedPostRequest
{
    const ENDPOINT = '/channels/%s/restore';

    /**
     * @var string
     */
    protected $channelId;

    /**
     * RestoreChannelRequest constructor.
     * @param string $channelId
     */
    public function __construct(string $channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return [];
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
     * @throws \Fiyo\Mattermost\Exception\InvalidEntityFactoryException
     * @throws \Fiyo\Mattermost\Exception\UnexpectedBodyException
     */
    public function handleResponse(Response $response)
    {
        $this->output = EntityFactory::create($response, ChannelFactory::class);
    }
}