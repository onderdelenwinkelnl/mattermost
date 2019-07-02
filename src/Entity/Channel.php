<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class Channel
 * @package Fiyo\Mattermost\Entity
 */
class Channel extends AbstractTimedEntity
{
    /**
     * @var string
     */
    protected $teamId;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $header;

    /**
     * @var string
     */
    protected $purpose;

    /**
     * @var \DateTime|null
     */
    protected $lastPostAt;

    /**
     * @var int
     */
    protected $totalMessageCount;

    /**
     * @var \DateTime|null
     */
    protected $extraUpdateAt;

    /**
     * @var string
     */
    protected $creatorId;

    /**
     * @return string
     */
    public function getTeamId(): string
    {
        return $this->teamId;
    }

    /**
     * @param string $teamId
     */
    public function setTeamId(string $teamId)
    {
        $this->teamId = $teamId;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName(string $displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @param string $header
     */
    public function setHeader(string $header)
    {
        $this->header = $header;
    }

    /**
     * @return string
     */
    public function getPurpose(): string
    {
        return $this->purpose;
    }

    /**
     * @param string $purpose
     */
    public function setPurpose(string $purpose)
    {
        $this->purpose = $purpose;
    }

    /**
     * @return \DateTime|null
     */
    public function getLastPostAt()
    {
        return $this->lastPostAt;
    }

    /**
     * @param \DateTime|null $lastPostAt
     */
    public function setLastPostAt(\DateTime $lastPostAt)
    {
        $this->lastPostAt = $lastPostAt;
    }

    /**
     * @return int
     */
    public function getTotalMessageCount(): int
    {
        return $this->totalMessageCount;
    }

    /**
     * @param int $totalMessageCount
     */
    public function setTotalMessageCount(int $totalMessageCount)
    {
        $this->totalMessageCount = $totalMessageCount;
    }

    /**
     * @return \DateTime|null
     */
    public function getExtraUpdateAt()
    {
        return $this->extraUpdateAt;
    }

    /**
     * @param \DateTime|null $extraUpdateAt
     */
    public function setExtraUpdateAt(\DateTime $extraUpdateAt)
    {
        $this->extraUpdateAt = $extraUpdateAt;
    }

    /**
     * @return string
     */
    public function getCreatorId(): string
    {
        return $this->creatorId;
    }

    /**
     * @param string $creatorId
     */
    public function setCreatorId(string $creatorId)
    {
        $this->creatorId = $creatorId;
    }
}