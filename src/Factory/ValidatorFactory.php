<?php

namespace Fiyo\Mattermost\Factory;

use Fiyo\Mattermost\Exception\InvalidValidatorFactoryException;
use Fiyo\Mattermost\Validator\ValidatorInterface;

/**
 * Class ValidatorFactory
 * @package Fiyo\Mattermost\Factory
 */
class ValidatorFactory
{
    /**
     * @param string $validatorClass
     * @param $value
     * @return ValidatorInterface
     * @throws InvalidValidatorFactoryException
     */
    public static function create(string $validatorClass, $value)
    {
        if (!class_exists($validatorClass)) {
            throw new InvalidValidatorFactoryException(sprintf('Class %s does not exist', $validatorClass));
        }

        $class = new $validatorClass($value);
        if (!$class instanceof ValidatorInterface) {
            throw new InvalidValidatorFactoryException('Class %s should be an instance of %s', $validatorClass, ValidatorInterface::class);
        }

        return $class;
    }
}