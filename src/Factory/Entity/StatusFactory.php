<?php

namespace Fiyo\Mattermost\Factory\Entity;

use Fiyo\Mattermost\Entity\Status;

/**
 * Class StatusFactory
 * @package Fiyo\Mattermost\Factory\Entity
 */
class StatusFactory implements FactoryEntityInterface
{
    const FIELD_STATUS = 'status';

    /**
     * @param \stdClass $content
     * @return mixed|void
     */
    public function build(\stdClass $content)
    {
        $status = new Status();
        $status->setStatus($content->{self::FIELD_STATUS});

        return $status;
    }
}