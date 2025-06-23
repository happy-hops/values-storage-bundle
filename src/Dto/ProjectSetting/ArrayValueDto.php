<?php

namespace BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting;

class ArrayValueDto extends AbstractDto implements DtoInterface
{
    public function getValue(): array
    {
        return $this->value;
    }

    public function setValue(mixed $value): static
    {
        $this->value = (array) $value;

        return $this;
    }
}
