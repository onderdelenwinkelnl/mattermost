<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;
use Fiyo\Mattermost\Entity\ChannelStatistics;

/**
 * Class ChannelStatisticsTest
 */
class ChannelStatisticsTest extends BaseTest
{
    public function testGettersAndSetters()
    {
        $channelStatistics = new ChannelStatistics();

        $channelStatistics->setChannelId('xnUp9Wa6I');
        $this->assertEquals('xnUp9Wa6I', $channelStatistics->getChannelId());

        $channelStatistics->setMemberCount(6941);
        $this->assertEquals(6941, $channelStatistics->getMemberCount());
    }
}