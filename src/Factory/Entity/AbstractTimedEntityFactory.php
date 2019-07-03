<?php

namespace Fiyo\Mattermost\Factory\Entity;

use Fiyo\Mattermost\Entity\TimedEntityInterface;

/**
 * Class AbstractTimedEntityFactory
 * @package Fiyo\Mattermost\Factory\Entity
 */
abstract class AbstractTimedEntityFactory implements FactoryEntityInterface
{
    const FIELD_ID         = 'id';
    const FIELD_CREATED_AT = 'create_at';
    const FIELD_UPDATED_AT = 'update_at';
    const FIELD_DELETED_AT = 'delete_at';

    /**
     * @param \stdClass $content
     * @return TimedEntityInterface
     */
    abstract protected function preBuild(\stdClass $content): TimedEntityInterface;

    final public function build(\stdClass $content)
    {
        $entity = $this->preBuild($content);

        $entity->setId($content->{self::FIELD_ID});
        $entity->setCreatedAt((new \DateTime())->setTimestamp($content->{self::FIELD_CREATED_AT}));

        $updatedAt = $content->{self::FIELD_UPDATED_AT};
        if ($updatedAt) {
            $entity->setUpdatedAt((new \DateTime())->setTimestamp($updatedAt));
        }

        $deletedAt = $content->{self::FIELD_DELETED_AT};
        if ($deletedAt) {
            $entity->setDeletedAt((new \DateTime())->setTimestamp($deletedAt));
        }

        return $entity;
    }
}