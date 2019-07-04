<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;
use Fiyo\Mattermost\Entity\Status;

/**
 * Class StatusTest
 */
class StatusTest extends BaseTest
{
    public function testGettersAndSetters()
    {
        $status = new Status();

        $status->setStatus('vBkvubQm7oq');
        $this->assertEquals('vBkvubQm7oq', $status->getStatus());
    }
}