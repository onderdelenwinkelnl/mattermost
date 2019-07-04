<?php

namespace Fiyo\Mattermost\Factory\Entity;

use Fiyo\Mattermost\Entity\ChannelStatistics;

/**
 * Class ChannelStatisticsFactory
 * @package Fiyo\Mattermost\Factory\Entity
 */
class ChannelStatisticsFactory implements FactoryEntityInterface
{
    const FIELD_CHANNEL_ID   = 'channel_id';
    const FIELD_MEMBER_COUNT = 'member_count';

    /**
     * @param \stdClass $content
     * @return ChannelStatistics|mixed
     */
    public function build(\stdClass $content)
    {
        $channelStatistics = new ChannelStatistics();
        $channelStatistics->setChannelId($content->{self::FIELD_CHANNEL_ID});
        $channelStatistics->setMemberCount($content->{self::FIELD_MEMBER_COUNT});

        return $channelStatistics;
    }
}