<?php

namespace Fiyo\Mattermost\Validator\Channel;

use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Exception\MissingValueException;
use Fiyo\Mattermost\Validator\AbstractValidator;

/**
 * Class CreateChannelValidator
 * @package Fiyo\Mattermost\Validator\Channel
 */
class CreateChannelValidator extends AbstractValidator
{
    public function validateEntity()
    {
        /** @var Channel $channel */
        $channel = $this->value;

        if (empty($channel->getTeamId())) {
            throw new MissingValueException(sprintf("Missing required field TeamId in %s", Channel::class));
        }

        if (empty($channel->getName())) {
            throw new MissingValueException(sprintf("Missing required field Name in %s", Channel::class));
        }

        if (empty($channel->getDisplayName())) {
            throw new MissingValueException(sprintf("Missing required field DisplayName in %s", Channel::class));
        }

        if (empty($channel->getType())) {
            throw new MissingValueException(sprintf("Missing required field Type in %s", Channel::class));
        }
    }

    /**
     * @return string
     */
    protected function getValueClass(): string
    {
        return Channel::class;
    }
}