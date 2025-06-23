<?php

namespace BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting;

class FloatValueDto extends AbstractDto implements DtoInterface
{
    public function getValue(): float
    {
        return $this->value;
    }

    public function setValue(mixed $value): static
    {
        $this->value = (float) $value;

        return $this;
    }
}
