<?php

namespace Fiyo\Mattermost\Factory\Entity;

use Fiyo\Mattermost\Entity\TimedEntityInterface;
use Fiyo\Mattermost\Entity\User;

/**
 * Class UserFactory
 * @package Fiyo\Mattermost\Factory\Entity
 */
class UserFactory extends AbstractTimedEntityFactory
{
    const FIELD_USERNAME     = 'username';
    const FIELD_AUTH_DATA    = 'auth_data';
    const FIELD_AUTH_SERVICE = 'auth_service';
    const FIELD_EMAIL        = 'email';
    const FIELD_NICKNAME     = 'nickname';
    const FIELD_FIRST_NAME   = 'first_name';
    const FIELD_LAST_NAME    = 'last_name';
    const FIELD_POSITION     = 'position';
    const FIELD_ROLES        = 'roles';
    const FIELD_LOCALE       = 'locale';

    protected function preBuild(\stdClass $content): TimedEntityInterface
    {
        $user = new User();

        $user->setUsername($content->{self::FIELD_USERNAME});
        $user->setAuthDate($content->{self::FIELD_AUTH_DATA});
        $user->setAuthService($content->{self::FIELD_AUTH_SERVICE});
        $user->setEmail($content->{self::FIELD_EMAIL});
        $user->setNickname($content->{self::FIELD_NICKNAME});
        $user->setFirstname($content->{self::FIELD_FIRST_NAME});
        $user->setLastname($content->{self::FIELD_LAST_NAME});
        $user->setPosition($content->{self::FIELD_POSITION});
        $user->setRoles($content->{self::FIELD_ROLES});
        $user->setLocale($content->{self::FIELD_LOCALE});

        return $user;
    }
}


