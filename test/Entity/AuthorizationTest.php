<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;
use Fiyo\Mattermost\Entity\Authorization;

/**
 * Class AuthorizationTest
 */
class AuthorizationTest extends BaseTest
{
    public function testGettersAndSetters()
    {
        $authorization = new Authorization('pECijPdltdKyAK');
        $this->assertEquals('pECijPdltdKyAK', $authorization->getToken());
    }
}