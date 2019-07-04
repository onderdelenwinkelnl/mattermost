<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;
use Fiyo\Mattermost\Entity\Channel;

/**
 * Class ChannelTest
 */
class ChannelTest extends BaseTest
{
    public function testGettersAndSetters()
    {
        $channel = new Channel();

        $channel->setTeamId('sEZe5xNiObUxlEX');
        $this->assertEquals('sEZe5xNiObUxlEX', $channel->getTeamId());

        $this->expectException(\InvalidArgumentException::class);
        $channel->setType('QgSysf2poYc7z');

        $channel->setType(Channel::TYPE_GROUP);
        $this->assertEquals(Channel::TYPE_GROUP, $channel->getType());

        $channel->setDisplayName('5bruKM2azK');
        $this->assertEquals('5bruKM2azK', $channel->getDisplayName());

        $channel->setName('wsoWbIa2R6');
        $this->assertEquals('wsoWbIa2R6', $channel->getName());

        $channel->setHeader('sHhOQ');
        $this->assertEquals('sHhOQ', $channel->getHeader());

        $channel->setPurpose('5EwfKWY6Xf3iEw8');
        $this->assertEquals('5EwfKWY6Xf3iEw8', $channel->getPurpose());

        $channel->setTotalMessageCount(4744);
        $this->assertEquals(4744, $channel->getTotalMessageCount());

        $channel->setCreatorId('KMohU');
        $this->assertEquals('KMohU', $channel->getCreatorId());

        $channel->setId('cWI6PXhW');
        $this->assertEquals('cWI6PXhW', $channel->getId());
    }
}