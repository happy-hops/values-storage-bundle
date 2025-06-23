<?php

namespace BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting;

class IntegerValueDto extends AbstractDto implements DtoInterface
{
    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(mixed $value): static
    {
        $this->value = (int) $value;

        return $this;
    }
}
