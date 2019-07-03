<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class Channel
 * @package Fiyo\Mattermost\Entity
 */
class Channel extends AbstractTimedEntity
{
    const TYPE_PUBLIC  = 'O';
    const TYPE_PRIVATE = 'P';
    const TYPE_DIRECT  = 'D';

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
    public function getTeamId()
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $allowedTypes = [
            self::TYPE_PUBLIC,
            self::TYPE_PRIVATE,
            self::TYPE_DIRECT,
        ];

        if (!in_array($type, $allowedTypes)) {
            throw new \InvalidArgumentException(sprintf("Invalid type '%s' specified, only one of the following is allowed: %s", $type, implode(", ", $allowedTypes)));
        }

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDisplayName()
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
    public function getName()
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
    public function getHeader()
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
    public function getPurpose()
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
    public function getTotalMessageCount()
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
    public function getCreatorId()
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