<?php

namespace Fiyo\Mattermost\Validator\Post;

use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Exception\MissingValueException;
use Fiyo\Mattermost\Validator\AbstractValidator;

/**
 * Class CreatePostValidator
 * @package Fiyo\Mattermost\Validator
 */
class CreatePostValidator extends AbstractValidator
{
    public function validateEntity()
    {
        /** @var Post $post */
        $post = $this->value;

        if (empty($post->getChannelId())) {
            throw new MissingValueException(sprintf("Missing required field ChannelId in %s", Post::class));
        }

        if (empty($post->getMessage())) {
            throw new MissingValueException(sprintf("Missing required field message in %s", Post::class));
        }
    }

    /**
     * @return string
     */
    protected function getValueClass(): string
    {
        return Post::class;
    }
}