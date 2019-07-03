<?php

namespace Fiyo\Mattermost\Request\User;

use Fiyo\Mattermost\Factory\Entity\UserFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPostRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetUserByUsernameRequest
 * @package Fiyo\Mattermost\Request\User
 */
class GetUserByUsernameRequest extends AbstractAuthorisedPostRequest
{
    const ENDPOINT = '/users/usernames';

    protected $usernames = [];

    /**
     * GetUserByUsernameRequest constructor.
     * @param string|string[] $usernames
     */
    public function __construct($usernames)
    {
        if (!is_array($usernames)) {
            $usernames = [$usernames];
        }
        $this->usernames = $usernames;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->usernames;
    }

    /**
     * @param Response $response
     * @throws \Fiyo\Mattermost\Exception\InvalidEntityFactoryException
     * @throws \Fiyo\Mattermost\Exception\UnexpectedBodyException
     */
    public function handleResponse(Response $response)
    {
        $this->output = EntityFactory::create($response, UserFactory::class);
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}