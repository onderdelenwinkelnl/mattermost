<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPostRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class SearchGroupChannelRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class SearchGroupChannelRequest extends AbstractAuthorisedPostRequest
{
    const ENDPOINT = '/group/search';

    const FIELD_TERM = 'term';

    /**
     * @var string
     */
    protected $searchTerm;

    /**
     * SearchGroupChannelRequest constructor.
     * @param string $searchTerm
     */
    public function __construct(string $searchTerm)
    {
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
        return self::ENDPOINT;
    }
}