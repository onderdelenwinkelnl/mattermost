<?php


namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractGetRequest;
use Fiyo\Mattermost\Request\AuthenticatedInterface;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetChannelByNameRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class GetChannelByNameRequest extends AbstractGetRequest implements AuthenticatedInterface
{
    const ENDPOINT = '/teams/%s/channels/name/%s';

    /**
     * @var string
     */
    protected $teamId;

    /**
     * @var string
     */
    protected $name;

    /**
     * GetChannelByNameRequest constructor.
     * @param string $teamId
     * @param string $name
     */
    public function __construct(string $teamId, string $name)
    {
        $this->teamId = $teamId;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->teamId, $this->name);
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