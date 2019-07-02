<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class Status
 * @package Fiyo\Mattermost\Entity
 */
class Status
{
    /**
     * @var string
     */
    protected $status;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}