<?php

namespace Fiyo\Mattermost\Request\Post;

use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Factory\Entity\PostFactory;
use Fiyo\Mattermost\Factory\EntityFactory;
use Fiyo\Mattermost\Factory\ValidatorFactory;
use Fiyo\Mattermost\Request\AbstractAuthorisedPutRequest;
use Fiyo\Mattermost\Validator\Post\PostIdValidator;
use GuzzleHttp\Psr7\Response;

/**
 * Class UpdatePostRequest
 * @package Fiyo\Mattermost\Request\Post
 */
class UpdatePostRequest extends AbstractAuthorisedPutRequest
{
    const ENDPOINT = '/posts/%s';

    const FIELD_ID         = 'id';
    const FIELD_CHANNEL_ID = 'channel_id';
    const FIELD_MESSAGE    = 'message';
    const FIELD_FILE_IDS   = 'file_ids';
    const FIELD_PROPS      = 'props';

    /**
     * @var Post
     */
    protected $post;

    /**
     * UpdatePostRequest constructor.
     * @param Post $post
     * @throws \Fiyo\Mattermost\Exception\InvalidValidatorFactoryException
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
        ValidatorFactory::create(PostIdValidator::class, $this->post)->validate();
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        $content = [
            self::FIELD_ID => $this->post->getId(),
            self::FIELD_CHANNEL_ID => $this->post->getChannelId(),
            self::FIELD_MESSAGE => $this->post->getMessage(),
        ];


        if (!empty($this->post->getFileIds())) {
            $content[self::FIELD_FILE_IDS] = $this->post->getFileIds();
        }

        if (!empty($this->post->getProps())) {
            $content[self::FIELD_PROPS] = $this->post->getProps();
        }

        return $content;
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

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT, $this->post->getId());
    }
}