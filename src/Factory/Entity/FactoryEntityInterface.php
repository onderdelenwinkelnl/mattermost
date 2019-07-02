<?php


namespace Fiyo\Mattermost\Factory\Entity;

/**
 * Interface FactoryEntityInterface
 * @package Fiyo\Mattermost\Factory\Entity
 */
interface FactoryEntityInterface
{
    /**
     * @param \stdClass $content
     * @return mixed
     */
    public function build(\stdClass $content);
}