<?php

namespace BuesingIt\ProjectSettingsBundle\Service;

use Doctrine\DBAL\Connection as DBALConnection;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;

class DbManager implements DbManagerInterface
{
    private string $table = 'matbue_project_settings';

    public function __construct(
        private readonly DBALConnection $driverConnection,
    )
    {}

    public function getValue(string $name, string|null $param): string|null
    {
        $qb = $this->driverConnection->createQueryBuilder()
            ->select('value')
            ->from($this->table)
            ->where('name = :name')
            ->setParameter('name', $name);

        ($param === null)
            ? $qb->andWhere('param IS NULL')
            : $qb
                ->andWhere('param = :param')
                ->setParameter('param', $param);

        return $qb
            ->executeQuery()
            ->fetchOne();
    }

    public function saveValue(string $name, string|null $param, string $value): void
    {
        $qb = $this->driverConnection->createQueryBuilder()
            ->select('COUNT(*)')
            ->from($this->table)
            ->where('name = :name')
            ->setParameter('name', $name);

        ($param === null)
            ? $qb->andWhere('param IS NULL')
            : $qb
                ->andWhere('param = :param')
                ->setParameter('param', $param);

        $rows = (int) $qb
            ->executeQuery()
            ->fetchOne();

        ($rows === 0)
            ? $this->createRow($name, $param, $value)
            : $this->updateRow($name, $param, $value);
    }

    public function deleteValue(string $name, string|null $param): void
    {
        $qb = $this->driverConnection->createQueryBuilder()
            ->delete('value')
            ->from($this->table)
            ->where('name = :name')
            ->setParameter('name', $name);

        ($param === null)
            ? $qb->andWhere('param IS NULL')
            : $qb
                ->andWhere('param = :param')
                ->setParameter('param', $param);

        $qb
            ->executeQuery()
            ->fetchOne();
    }

    private function createRow(string $name, string|null $param, string $value): void
    {
        $values = [
            'name'        => ':name',
            'value'       => ':value',
            'modified_at' => 'NOW()',
        ];

        if ($param !== null) {
            $values['param'] = $param;
        }

        $this->driverConnection->createQueryBuilder()
            ->insert($this->table)
            ->values($values)
            ->setParameter('name', $name)
            ->setParameter('param', $param)
            ->setParameter('value', $value)
            ->executeQuery();
    }

    private function updateRow(string $name, string|null $param, string $value): void
    {
        $qb = $this->driverConnection->createQueryBuilder()
            ->update($this->table)
            ->set('value', ':value')
            ->set('modified_at', 'NOW()')
            ->where('name = :name')
            ->setParameter('name', $name)
            ->setParameter('value', $value);

        ($param === null)
            ? $qb->andWhere('param IS NULL')
            : $qb
                ->andWhere('param = :param')
                ->setParameter('param', $param);

        $qb->executeQuery();
    }

    public function configureSchema(Schema $schema): void
    {
        if ($schema->hasTable($this->table)) {
            return;
        }

        $table = $schema->createTable($this->table);
        $table->addColumn('id', Types::INTEGER, ['autoincrement' => true]);
        $table->addColumn('name', Types::STRING, ['length' => 100, 'notnull' => true]);
        $table->addColumn('param', Types::STRING, ['length' => 100, 'notnull' => false, 'default' => null]);
        $table->addColumn('value', Types::TEXT, ['notnull' => true]);
        $table->addColumn('modified_at', Types::DATETIME_IMMUTABLE, ['notnull' => true]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['name', 'param']);
    }
}
