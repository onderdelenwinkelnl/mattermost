<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;

/**
 * Class Status
 */
class Status extends BaseTest
{
    public function testGettersAndSetters()
    {
        $status = new \Fiyo\Mattermost\Entity\Status();
        $status->setStatus('test');

        $this->assertEquals('test', $status->getStatus());
    }
}