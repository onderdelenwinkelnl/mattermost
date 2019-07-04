<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetChannelByNameAndTeamName
 * @package Fiyo\Mattermost\Request\Channel
 */
class GetChannelByNameAndTeamName extends AbstractAuthorisedGetRequest
{
    const ENDPOINT = '/teams/name/%s/channels/name/%s';

    const PARAMETER_INCLUDE_DELETED = 'include_deleted';
    const PARAMETER_INCLUDE_DELETED_YES = 'true';
    const PARAMETER_INCLUDE_DELETED_NO = 'false';

    /**
     * @var string
     */
    protected $teamName;

    /**
     * @var string
     */
    protected $channelName;

    /**
     * @var bool
     */
    protected $includeDeleted = false;

    /**
     * GetChannelByNameAndTeamName constructor.
     * @param string $teamName
     * @param string $channelName
     */
    public function __construct(string $teamName, string $channelName)
    {
        $this->teamName = $teamName;
        $this->channelName = $channelName;
    }

    /**
     * @param bool $includeDeleted
     */
    public function includeDeleted($includeDeleted = true)
    {
        $this->includeDeleted = $includeDeleted;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return [
            self::PARAMETER_INCLUDE_DELETED => $this->includeDeleted ? self::PARAMETER_INCLUDE_DELETED_YES : self::PARAMETER_INCLUDE_DELETED_NO,
        ];
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->teamName, $this->channelName);
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