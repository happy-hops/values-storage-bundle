<?php

namespace BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting;

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
