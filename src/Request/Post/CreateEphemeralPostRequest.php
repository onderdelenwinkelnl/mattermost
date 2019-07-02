<?php

namespace Fiyo\Mattermost\Request\Post;

use Fiyo\Mattermost\Entity\Post;

/**
 * Class CreateEphemeralPostRequest
 * @package Fiyo\Mattermost\Request\Post
 */
class CreateEphemeralPostRequest extends AbstractCreatePostRequest
{
    const ENDPOINT = '/posts/ephemeral';

    const FIELD_USER_ID = 'user_id';
    const FIELD_POST    = 'post';

    /**
     * @var string
     */
    protected $userId;

    /**
     * CreateEphemeralPostRequest constructor.
     * @param string $userId
     * @param Post $post
     */
    public function __construct(string $userId, Post $post)
    {
        $this->userId = $userId;

        parent::__construct($post);
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return [
            self::FIELD_USER_ID => $this->userId,
            self::METHOD_POST => $this->getPostContent(),
        ];
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }
}