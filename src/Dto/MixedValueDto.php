<?php

namespace MatBuesing\ValuesStorageBundle\Dto;

class MixedValueDto extends AbstractDto implements DtoInterface
{
    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setValue(mixed $value): static
    {
        $this->value = $value;

        return $this;
    }
}
