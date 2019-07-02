<?php

namespace Fiyo\Mattermost\Request\Post;

use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Factory\Entity\StatusFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Factory\ValidatorFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedDeleteRequest;
use Fiyo\Mattermost\Validator\Post\PostIdValidator;
use GuzzleHttp\Psr7\Response;

/**
 * Class DeletePostRequest
 * @package Fiyo\Mattermost\Request\Post
 */
class DeletePostRequest extends AbstractAuthorisedDeleteRequest
{
    const ENDPOINT = '/posts/%s';

    /**
     * @var Post
     */
    protected $post;

    /**
     * DeletePostRequest constructor.
     * @param Post $post
     * @throws \Fiyo\Mattermost\Exception\InvalidValidatorFactoryException
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->validate();
    }

    /**
     * @throws \Fiyo\Mattermost\Exception\InvalidValidatorFactoryException
     */
    protected function validate()
    {
        $validator = ValidatorFactory::create(PostIdValidator::class, $this->post);
        $validator->validate();
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

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->post->getId());
    }
}