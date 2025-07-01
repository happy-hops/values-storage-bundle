<?php

namespace HappyHops\ValuesStorageBundle\Service;

use HappyHops\ValuesStorageBundle\Dto\DtoInterface;
use HappyHops\ValuesStorageBundle\Repository\StoredValueRepository;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

final readonly class ValuesStorageService implements ValuesStorageServiceInterface
{
    public function __construct(
        #[Autowire(param: 'happy_hops_values_storage.default_values')]
        private array                 $defaultValues,
        private StoredValueRepository $storedValueRepo,
    )
    {}

    public function save(DtoInterface $dto): void
    {
        $this->storedValueRepo->persist($dto->getName(), $dto->getParam(), serialize($dto->getValue()));
    }

    public function load(DtoInterface $dto): void
    {
        $value = $this->storedValueRepo->find($dto->getName(), $dto->getParam());

        $value = ($value === null)
            ? $this->getDefaultValue($dto->getName(), $dto->getParam())
            : unserialize($value);

        $dto->setValue($value);
    }

    private function getDefaultValue(string $name, string|null $param): mixed
    {
        if (array_key_exists($name, $this->defaultValues)) {
            if (is_array($this->defaultValues[$name])) {
                $defaultValuesArr = $this->defaultValues[$name];
                if (array_key_exists($param, $defaultValuesArr)) {
                    return $defaultValuesArr[$param];
                }

                if (array_key_exists('__default__', $defaultValuesArr)) {
                    return $defaultValuesArr['__default__'];
                }
            }

            $defaultValue = $this->defaultValues[$name];

            if (is_string($defaultValue) || is_numeric($defaultValue) || is_bool($defaultValue)) {
                return $defaultValue;
            }
        }

        return null;
    }
}
