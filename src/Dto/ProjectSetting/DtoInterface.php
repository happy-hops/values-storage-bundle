<?php

namespace BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting;

interface DtoInterface
{
    public function getName(): mixed;

    public function getParam(): string|null;

    public function getValue(): mixed;

    public function setValue(mixed $value): static;
}
