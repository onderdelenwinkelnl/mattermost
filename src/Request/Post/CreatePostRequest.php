<?php

namespace Fiyo\Mattermost\Request\Post;

/**
 * Class CreatePostRequest
 * @package Fiyo\Mattermost\Request\Post
 */
class CreatePostRequest extends AbstractCreatePostRequest
{
    const ENDPOINT = '/posts';

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * @return array
     */
    public function getContent(): array
    {
        return $this->getPostContent();
    }
}