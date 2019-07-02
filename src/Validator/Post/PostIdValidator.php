<?php

namespace Fiyo\Mattermost\Validator\Post;

use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Exception\ValidatorException;
use Fiyo\Mattermost\Validator\AbstractValidator;

/**
 * Class PostIdValidator
 * @package Fiyo\Mattermost\Validator\Post
 */
class PostIdValidator extends AbstractValidator
{
    /**
     * @throws ValidatorException
     */
    protected function validateEntity()
    {
        if (empty($this->value->getId())) {
            throw new ValidatorException(sprintf('Id is required in: %s', $this->getValueClass()));
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