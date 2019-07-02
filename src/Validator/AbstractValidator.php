<?php

namespace Fiyo\Mattermost\Validator;

use Fiyo\Mattermost\Exception\ValidatorException;

/**
 * Class AbstractValidator
 * @package Fiyo\Mattermost\Validator
 */
abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var object
     */
    protected $value;

    /**
     * AbstractValidator constructor.
     * @param mixed$value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    final public function validate()
    {
        if (!is_object($this->value)) {
            throw new ValidatorException(sprintf('Validator value should be an object instance of %s, %s provided', $this->getValueClass(), gettype($this->value)));
        }

        $valueClass = $this->getValueClass();
        if (!$this->value instanceof $valueClass) {
            throw new ValidatorException(sprintf('Invalid class %s, %s expected', get_class($this->value), $this->getValueClass()));
        }

        $this->validateEntity();
    }

    /**
     * @return void
     */
    abstract protected function validateEntity();

    /**
     * @return string
     */
    abstract protected function getValueClass(): string;
}