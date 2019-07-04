<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class ChannelStatistics
 * @package Fiyo\Mattermost\Entity
 */
class ChannelStatistics
{
    /**
     * @var string
     */
    protected $channelId;

    /**
     * @var int
     */
    protected $memberCount;

    /**
     * @return string
     */
    public function getChannelId(): string
    {
        return $this->channelId;
    }

    /**
     * @param string $channelId
     */
    public function setChannelId(string $channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * @return int
     */
    public function getMemberCount(): int
    {
        return $this->memberCount;
    }

    /**
     * @param int $memberCount
     */
    public function setMemberCount(int $memberCount)
    {
        $this->memberCount = $memberCount;
    }
}