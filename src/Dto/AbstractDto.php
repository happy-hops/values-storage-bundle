<?php

namespace MatBuesing\ValuesStorageBundle\Dto;

abstract class AbstractDto
{
    protected mixed $value;

    public function __construct(
        private readonly string      $name,
        private readonly string|null $param = null
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getParam(): string|null
    {
        return $this->param;
    }

    abstract public function getValue(): mixed;

    abstract public function setValue(mixed $value): static;
}
