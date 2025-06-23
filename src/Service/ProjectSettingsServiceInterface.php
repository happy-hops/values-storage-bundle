<?php

namespace BuesingIt\ProjectSettingsBundle\Service;

use BuesingIt\ProjectSettingsBundle\Dto\ProjectSetting\DtoInterface;

interface ProjectSettingsServiceInterface
{
    public function save(DtoInterface $dto): void;

    public function load(DtoInterface $dto): void;
}
