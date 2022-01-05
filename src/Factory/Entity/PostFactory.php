<?php

namespace Fiyo\Mattermost\Factory\Entity;

use Fiyo\Mattermost\Entity\Post;
use Fiyo\Mattermost\Entity\TimedEntityInterface;

/**
 * Class PostFactory
 * @package Fiyo\Mattermost\Factory\Entity
 */
class PostFactory extends AbstractTimedEntityFactory
{
    const FIELD_IS_PINNED = 'is_pinned';
    const FIELD_USER_ID = 'user_id';
    const FIELD_CHANNEL_ID = 'channel_id';
    const FIELD_ROOT_ID = 'root_id';
    const FIELD_ORIGINAL_ID = 'original_id';
    const FIELD_MESSAGE = 'message';
    const FIELD_TYPE = 'type';
    const FIELD_PROPS = 'props';
    const FIELD_HASHTAGS = 'hashtags';
    const FIELD_PENDING_POST_ID = 'pending_post_id';
    const FIELD_METADATA = 'metadata';

    /**
     * @param \stdClass $content
     * @return TimedEntityInterface
     */
    protected function preBuild(\stdClass $content): TimedEntityInterface
    {
        $post = new Post();

        $post->setPinned($content->{self::FIELD_IS_PINNED});
        $post->setUserId($content->{self::FIELD_USER_ID});
        $post->setChannelId($content->{self::FIELD_CHANNEL_ID});
        $post->setRootId($content->{self::FIELD_ROOT_ID});
        $post->setOriginalId($content->{self::FIELD_ORIGINAL_ID});
        $post->setMessage($content->{self::FIELD_MESSAGE});
        $post->setType($content->{self::FIELD_TYPE});
        $post->setProps($content->{self::FIELD_PROPS});
        $post->setHashtags($content->{self::FIELD_HASHTAGS});
        $post->setPendingPostId($content->{self::FIELD_PENDING_POST_ID});
        $post->setMetadata($content->{self::FIELD_METADATA});

        return $post;
    }
}

