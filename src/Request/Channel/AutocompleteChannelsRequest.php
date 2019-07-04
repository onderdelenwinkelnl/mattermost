<?php

namespace Fiyo\Mattermost\Request\Channel;

use Fiyo\Mattermost\Factory\Entity\ChannelFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class AutocompleteChannelsRequest
 * @package Fiyo\Mattermost\Request\Channel
 */
class AutocompleteChannelsRequest extends AbstractAuthorisedGetRequest
{
    const ENDPOINT = '/teams/%s/channels/autocomplete';

    const PARAMETER_NAME = 'name';

    /**
     * @var string
     */
    protected $teamId;

    /**
     * @var string
     */
    protected $searchTerm;

    /**
     * AutocompleteChannelsRequest constructor.
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
    public function getParameters(): array
    {
        return [
            self::PARAMETER_NAME => $this->searchTerm,
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