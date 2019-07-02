<?php

namespace Fiyo\Mattermost\Entity;

/**
 * Class Timezone
 * @package Fiyo\Mattermost\Entity
 */
class Timezone
{
    /**
     * @var string
     */
    protected $automaticTimezone;

    /**
     * @var string
     */
    protected $manualTimezone;

    /**
     * @var bool
     */
    protected $useAutomaticTimeZone;

    /**
     * @return string
     */
    public function getAutomaticTimezone(): string
    {
        return $this->automaticTimezone;
    }

    /**
     * @param string $automaticTimezone
     */
    public function setAutomaticTimezone(string $automaticTimezone)
    {
        $this->automaticTimezone = $automaticTimezone;
    }

    /**
     * @return string
     */
    public function getManualTimezone(): string
    {
        return $this->manualTimezone;
    }

    /**
     * @param string $manualTimezone
     */
    public function setManualTimezone(string $manualTimezone)
    {
        $this->manualTimezone = $manualTimezone;
    }

    /**
     * @return bool
     */
    public function useAutomaticTimeZone(): bool
    {
        return $this->useAutomaticTimeZone;
    }

    /**
     * @param bool $useAutomaticTimeZone
     */
    public function setUseAutomaticTimeZone(bool $useAutomaticTimeZone)
    {
        $this->useAutomaticTimeZone = $useAutomaticTimeZone;
    }
}