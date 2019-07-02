<?php

namespace Fiyo\Mattermost\Request\Post;

use Fiyo\Mattermost\Factory\Entity\PostFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedGetRequest;
use GuzzleHttp\Psr7\Response;

/**
 * Class GetPostRequest
 * @package Fiyo\Mattermost\Request\Post
 */
class GetPostRequest extends AbstractAuthorisedGetRequest
{
    const ENDPOINT = '/posts/%s';

    /**
     * @var string
     */
    protected $id;

    /**
     * GetPostRequest constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->id);
    }

    /**
     * @param Response $response
     * @throws \Fiyo\Mattermost\Exception\InvalidEntityFactoryException
     * @throws \Fiyo\Mattermost\Exception\UnexpectedBodyException
     */
    public function handleResponse(Response $response)
    {
        $this->output = EntityFactory::create($response, PostFactory::class);
    }
}