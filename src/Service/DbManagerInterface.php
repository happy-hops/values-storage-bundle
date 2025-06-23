<?php

namespace BuesingIt\ProjectSettingsBundle\Service;
use Doctrine\DBAL\Schema\Schema;

interface DbManagerInterface
{
    public function getValue(string $name, string|null $param): string|null;

    public function saveValue(string $name, string|null $param, string $value): void;

    public function deleteValue(string $name, string|null $param): void;

    public function configureSchema(Schema $schema): void;
}
