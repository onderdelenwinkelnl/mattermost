<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class Team
 * @package Fiyo\Mattermost\Entity
 */
class Team extends AbstractTimedEntity
{
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
    protected $description;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $allowedDomains;

    /**
     * @var string
     */
    protected $inviteId;

    /**
     * @var bool
     */
    protected $allowOpenInvite;

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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
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
    public function getAllowedDomains(): string
    {
        return $this->allowedDomains;
    }

    /**
     * @param string $allowedDomains
     */
    public function setAllowedDomains(string $allowedDomains)
    {
        $this->allowedDomains = $allowedDomains;
    }

    /**
     * @return string
     */
    public function getInviteId(): string
    {
        return $this->inviteId;
    }

    /**
     * @param string $inviteId
     */
    public function setInviteId(string $inviteId)
    {
        $this->inviteId = $inviteId;
    }

    /**
     * @return bool
     */
    public function isAllowOpenInvite(): bool
    {
        return $this->allowOpenInvite;
    }

    /**
     * @param bool $allowOpenInvite
     */
    public function setAllowOpenInvite(bool $allowOpenInvite)
    {
        $this->allowOpenInvite = $allowOpenInvite;
    }
}