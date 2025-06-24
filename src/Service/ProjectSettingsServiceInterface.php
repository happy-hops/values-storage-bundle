<?php

namespace MatBuesing\ValuesStorageBundle\Service;

use MatBuesing\ValuesStorageBundle\Dto\DtoInterface;

interface ProjectSettingsServiceInterface
{
    public function save(DtoInterface $dto): void;

    public function load(DtoInterface $dto): void;
}
