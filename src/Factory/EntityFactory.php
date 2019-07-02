<?php


namespace Fiyo\Mattermost\Factory;

use Fiyo\Mattermost\Exception\InvalidEntityFactoryException;
use Fiyo\Mattermost\Exception\UnexpectedBodyException;
use Fiyo\Mattermost\Factory\Entity\FactoryEntityInterface;
use GuzzleHttp\Psr7\Response;

/**
 * Class Entity
 * @package Fiyo\Mattermost\Factory
 */
class EntityFactory
{
    /**
     * @param Response $response
     * @param string $className
     * @return array|mixed
     * @throws InvalidEntityFactoryException
     * @throws UnexpectedBodyException
     */
    public static function create(Response $response, string $className)
    {
        if (!class_exists($className)) {
            throw new InvalidEntityFactoryException(sprintf('Class %s does not exist', $className));
        }

        /** @var FactoryEntityInterface $class */
        $class = new $className();
        if (!$class instanceof FactoryEntityInterface) {
            throw new InvalidEntityFactoryException(sprintf('Class %s should be an instance of %s', get_class($class), FactoryEntityInterface::class));
        }

        $json = $response->getBody();

        try {
            $content = \GuzzleHttp\json_decode($json);
        } catch (\InvalidArgumentException $exception) {
            throw new UnexpectedBodyException('Invalid json returned by mattermost: ' . $json);
        }

        if (!is_array($content)) {
            return $class->build($content);
        }

        $output = [];
        foreach ($content as $item) {
            $output[] = $class->build($item);
        }

        return $output;
    }
}