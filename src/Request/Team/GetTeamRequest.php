<?php

namespace Fiyo\Mattermost\Request\Team;

use Fiyo\Mattermost\Factory\Entity\TeamFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPagedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetTeamRequest
 * @package Fiyo\Mattermost\Request\Team
 */
class GetTeamRequest extends AbstractAuthorisedPagedGetRequest
{
    const ENDPOINT = '/teams';

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * @param Response $response
     * @throws \Fiyo\Mattermost\Exception\InvalidEntityFactoryException
     * @throws \Fiyo\Mattermost\Exception\UnexpectedBodyException
     */
    public function handleResponse(Response $response)
    {
        $this->output = EntityFactory::create($response, TeamFactory::class);
    }
}