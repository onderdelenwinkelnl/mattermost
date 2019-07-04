<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;
use Fiyo\Mattermost\Entity\Timezone;

/**
 * Class TimezoneTest
 */
class TimezoneTest extends BaseTest
{
    public function testGettersAndSetters()
    {
        $timezone = new Timezone();

        $timezone->setAutomaticTimezone('PQp2aSNmup9');
        $this->assertEquals('PQp2aSNmup9', $timezone->getAutomaticTimezone());

        $timezone->setManualTimezone('51v67DX');
        $this->assertEquals('51v67DX', $timezone->getManualTimezone());

        $timezone->setUseAutomaticTimeZone(false);
        $this->assertEquals(false, $timezone->useAutomaticTimeZone());
    }
}