<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;
use Fiyo\Mattermost\Entity\User;

/**
 * Class UserTest
 */
class UserTest extends BaseTest
{
    public function testGettersAndSetters()
    {
        $user = new User();

        $user->setUsername('94Djb');
        $this->assertEquals('94Djb', $user->getUsername());

        $user->setAuthDate('FwjMtusFpUb');
        $this->assertEquals('FwjMtusFpUb', $user->getAuthDate());

        $user->setAuthService('QZ3F8JhSVKI16t');
        $this->assertEquals('QZ3F8JhSVKI16t', $user->getAuthService());

        $user->setEmail('8t4ktmBXQJLHj4');
        $this->assertEquals('8t4ktmBXQJLHj4', $user->getEmail());

        $user->setNickname('lDkbqZZEkfC');
        $this->assertEquals('lDkbqZZEkfC', $user->getNickname());

        $user->setFirstname('5ApsX6nVwa9E');
        $this->assertEquals('5ApsX6nVwa9E', $user->getFirstname());

        $user->setLastname('RMdKsZUyN');
        $this->assertEquals('RMdKsZUyN', $user->getLastname());

        $user->setPosition('BqyoVIc');
        $this->assertEquals('BqyoVIc', $user->getPosition());

        $user->setRoles('NfJPazSluHOQ');
        $this->assertEquals('NfJPazSluHOQ', $user->getRoles());

        $user->setLocale('CzoR7xwPwVww');
        $this->assertEquals('CzoR7xwPwVww', $user->getLocale());

        $user->setId('1W92XQbb');
        $this->assertEquals('1W92XQbb', $user->getId());
    }
}