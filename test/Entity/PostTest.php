<?php

namespace Fiyo\Test\Entity;

use Fiyo\Test\BaseTest;
use Fiyo\Mattermost\Entity\Post;

/**
 * Class PostTest
 */
class PostTest extends BaseTest
{
    public function testGettersAndSetters()
    {
        $post = new Post();

        $post->setUserId('bjUDpyfmHZ');
        $this->assertEquals('bjUDpyfmHZ', $post->getUserId());

        $post->setChannelId('vVqNMjwy2W3Lz');
        $this->assertEquals('vVqNMjwy2W3Lz', $post->getChannelId());

        $post->setRootId('vfUdhAiEVv6wW');
        $this->assertEquals('vfUdhAiEVv6wW', $post->getRootId());

        $post->setMessage('BLX1a');
        $this->assertEquals('BLX1a', $post->getMessage());

        $post->setPinned(false);
        $this->assertEquals(false, $post->isPinned());

        $post->setId('s8jWQYM');
        $this->assertEquals('s8jWQYM', $post->getId());
    }
}