<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelStatisticsFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetChannelStatisticsRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class GetChannelStatisticsRequest extends AbstractAuthorisedGetRequest
{
    const ENDPOINT = '/channels/%s/stats';

    /**
     * @var string
     */
    protected $channelId;

    /**
     * GetChannelStatisticsRequest constructor.
     * @param string $channelId
     */
    public function __construct(string $channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @param Response $response
     * @throws \Fiyo\Mattermost\Exception\InvalidEntityFactoryException
     * @throws \Fiyo\Mattermost\Exception\UnexpectedBodyException
     */
    public function handleResponse(Response $response)
    {
       $this->output = EntityFactory::create($response, ChannelStatisticsFactory::class);
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->channelId);
    }
}