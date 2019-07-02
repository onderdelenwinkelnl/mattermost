<?php

namespace Fiyo\Mattermost\Factory\Entity;

use Fiyo\Mattermost\Entity\Channel;
use Fiyo\Mattermost\Entity\TimedEntityInterface;

/**
 * Class ChannelFactory
 * @package Fiyo\Mattermost\Factory\Entity
 */
class ChannelFactory extends AbstractTimedEntityFactory
{
    const FIELD_TEAM_ID         = 'team_id';
    const FIELD_TYPE            = 'type';
    const FIELD_DISPLAY_NAME    = 'display_name';
    const FIELD_NAME            = 'name';
    const FIELD_HEADER          = 'header';
    const FIELD_PURPOSE         = 'purpose';
    const FIELD_LAST_POST_AT    = 'last_post_at';
    const FIELD_TOTAL_MSG_COUNT = 'total_msg_count';
    const FIELD_EXTRA_UPDATE_AT = 'extra_update_at';
    const FIELD_CREATOR_ID      = 'creator_id';

    /**
     * @param \stdClass $content
     * @return TimedEntityInterface
     * @throws \Exception
     */
    protected function preBuild(\stdClass $content): TimedEntityInterface
    {
        $channel = new Channel();

        $channel->setTeamId($content->{self::FIELD_TEAM_ID});
        $channel->setType($content->{self::FIELD_TYPE});
        $channel->setDisplayName($content->{self::FIELD_DISPLAY_NAME});
        $channel->setName($content->{self::FIELD_NAME});
        $channel->setHeader($content->{self::FIELD_HEADER});
        $channel->setPurpose($content->{self::FIELD_PURPOSE});
        $channel->setTotalMessageCount($content->{self::FIELD_TOTAL_MSG_COUNT});
        $channel->setCreatorId($content->{self::FIELD_CREATOR_ID});

        $lastPostAt = $content->{self::FIELD_LAST_POST_AT};
        if ($lastPostAt) {
            $channel->setLastPostAt((new \DateTime())->setTimestamp($lastPostAt));
        }

        $extraUpdatedAt = $content->{self::FIELD_EXTRA_UPDATE_AT};
        if ($extraUpdatedAt) {
            $channel->setExtraUpdateAt((new \DateTime())->setTimestamp($extraUpdatedAt));
        }

        return $channel;
    }
}


