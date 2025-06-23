<?php

namespace BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting;

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
