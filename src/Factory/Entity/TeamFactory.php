<?php

namespace Fiyo\Mattermost\Factory\Entity;

use Fiyo\Mattermost\Entity\AbstractTimedEntity;
use Fiyo\Mattermost\Entity\Team;
use Fiyo\Mattermost\Entity\TimedEntityInterface;

/**
 * Class Team
 * @package Fiyo\Mattermost\Factory\Entity
 */
class TeamFactory extends AbstractTimedEntityFactory
{
    const FIELD_DISPLAY_NAME      = 'display_name';
    const FIELD_NAME              = 'name';
    const FIELD_DESCRIPTION       = 'description';
    const FIELD_EMAIL             = 'email';
    const FIELD_TYPE              = 'type';
    const FIELD_ALLOWED_DOMAINS   = 'allowed_domains';
    const FIELD_INVITE_ID         = 'invite_id';
    const FIELD_ALLOW_OPEN_INVITE = 'allow_open_invite';

    /**
     * @param \stdClass $content
     * @return TimedEntityInterface|Team
     */
    protected function preBuild(\stdClass $content): TimedEntityInterface
    {
        $team = new Team();
        $team->setDisplayName($content->{self::FIELD_DISPLAY_NAME});
        $team->setName($content->{self::FIELD_NAME});
        $team->setDescription($content->{self::FIELD_DESCRIPTION});
        $team->setEmail($content->{self::FIELD_EMAIL});
        $team->setType($content->{self::FIELD_TYPE});
        $team->setAllowedDomains($content->{self::FIELD_ALLOWED_DOMAINS});
        $team->setInviteId($content->{self::FIELD_INVITE_ID});
        $team->setAllowOpenInvite($content->{self::FIELD_ALLOW_OPEN_INVITE});

        return $team;
    }
}