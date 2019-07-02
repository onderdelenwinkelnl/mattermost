<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetChannelsRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class GetChannelsRequest extends AbstractAuthorisedGetRequest
{
    const ENDPOINT = '/teams/%s/channels';

    /**
     * @var string
     */
    protected $teamId;

    /**
     * GetChannelsRequest constructor.
     * @param string $teamId
     */
    public function __construct(string $teamId)
    {
        $this->teamId = $teamId;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->teamId);
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