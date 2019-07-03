<?php


namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\StatusFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedDeleteRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class DeleteChannelRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class DeleteChannelRequest extends AbstractAuthorisedDeleteRequest
{
    const ENDPOINT = '/channels/%s';

    /**
     * @var string
     */
    protected $channelId;

    /**
     * DeleteChannelRequest constructor.
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
     * @throws \Fiyo\Mattermost\Exception\InvalidEntityFactoryException
     * @throws \Fiyo\Mattermost\Exception\UnexpectedBodyException
     */
    public function handleResponse(Response $response)
    {
        $this->output = EntityFactory::create($response, StatusFactory::class);
    }
}