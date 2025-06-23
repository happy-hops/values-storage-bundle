<?php

namespace BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting;

class StringValueDto extends AbstractDto implements DtoInterface
{
    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(mixed $value): static
    {
        $this->value = (string) $value;

        return $this;
    }
}
