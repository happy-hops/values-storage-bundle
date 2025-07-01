<?php

namespace HappyHops\ValuesStorageBundle\Service;

use HappyHops\ValuesStorageBundle\Dto\DtoInterface;

interface ValuesStorageServiceInterface
{
    public function save(DtoInterface $dto): void;

    public function load(DtoInterface $dto): void;
}
