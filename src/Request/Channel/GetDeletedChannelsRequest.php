<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPagedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetDeletedChannelsRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class GetDeletedChannelsRequest extends AbstractAuthorisedPagedGetRequest
{
    const ENDPOINT = '/teams/%s/channels/deleted';

    /**
     * @var string
     */
    protected $teamId;

    /**
     * GetDeletedChannelsRequest constructor.
     * @param string $teamId
     */
    public function __construct(string $teamId)
    {
        $this->teamId = $teamId;
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
        return sprintf(self::ENDPOINT, $this->teamId);
    }
}