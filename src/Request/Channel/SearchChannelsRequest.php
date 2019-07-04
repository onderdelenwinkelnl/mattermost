<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPostRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class SearchChannelsRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class SearchChannelsRequest extends AbstractAuthorisedPostRequest
{
    const ENDPOINT = '/teams/%s/channels/search';

    const FIELD_TERM = 'term';

    /**
     * @var string
     */
    protected $teamId;

    /**
     * @var string
     */
    protected $searchTerm;

    /**
     * SearchChannelsRequest constructor.
     * @param string $teamId
     * @param string $searchTerm
     */
    public function __construct(string $teamId, string $searchTerm)
    {
        $this->teamId = $teamId;
        $this->searchTerm = $searchTerm;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return [
            self::FIELD_TERM => $this->searchTerm,
        ];
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