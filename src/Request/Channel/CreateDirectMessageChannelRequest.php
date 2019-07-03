<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPostRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class CreateDirectMessageChannelRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class CreateDirectMessageChannelRequest extends AbstractAuthorisedPostRequest
{
    const ENDPOINT = '/channels/direct';

    /**
     * @var array|string[]
     */
    protected $userIds = [];

    /**
     * CreateDirectMessageChannelRequest constructor.
     * @param array|string[] $userIds
     */
    public function __construct(array $userIds)
    {
        $this->userIds = $userIds;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->userIds;
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

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}