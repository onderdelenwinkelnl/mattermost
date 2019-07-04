<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;
use Fiyo\Mattermost\Entity\Team;

/**
 * Class TeamTest
 */
class TeamTest extends BaseTest
{
    public function testGettersAndSetters()
    {
        $team = new Team();

        $team->setDisplayName('s3BvU34');
        $this->assertEquals('s3BvU34', $team->getDisplayName());

        $team->setName('YdAoV8JdTHan');
        $this->assertEquals('YdAoV8JdTHan', $team->getName());

        $team->setDescription('K5z4LTyowb0fUeo');
        $this->assertEquals('K5z4LTyowb0fUeo', $team->getDescription());

        $team->setEmail('Gc086150aWk');
        $this->assertEquals('Gc086150aWk', $team->getEmail());

        $team->setType('0I2W9l1TdPnLvP');
        $this->assertEquals('0I2W9l1TdPnLvP', $team->getType());

        $team->setAllowedDomains('RjZi1IiXDnwgM');
        $this->assertEquals('RjZi1IiXDnwgM', $team->getAllowedDomains());

        $team->setInviteId('1reZgwJSp2Ea');
        $this->assertEquals('1reZgwJSp2Ea', $team->getInviteId());

        $team->setAllowOpenInvite(false);
        $this->assertEquals(false, $team->isAllowOpenInvite());

        $team->setId('pEPle0');
        $this->assertEquals('pEPle0', $team->getId());
    }
}