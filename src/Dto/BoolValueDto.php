<?php

namespace HappyHops\ValuesStorageBundle\Dto;

class BoolValueDto extends AbstractDto implements DtoInterface
{
    public function getValue(): bool
    {
        return $this->value;
    }

    public function setValue(mixed $value): static
    {
        $this->value = (bool) $value;

        return $this;
    }
}
