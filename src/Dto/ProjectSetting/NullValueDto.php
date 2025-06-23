<?php

namespace BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting;

class NullValueDto extends AbstractDto implements DtoInterface
{
    public function getValue(): null
    {
        return $this->value;
    }

    public function setValue(mixed $value): static
    {
        $this->value = null;

        return $this;
    }
}
