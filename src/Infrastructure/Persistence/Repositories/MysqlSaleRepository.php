<?php

namespace CleanArchitecture\Infrastructure\Persistence\Repositories;

use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use CleanArchitecture\Domain\Models\Sale;
use CleanArchitecture\Infrastructure\Persistence\Doctrine\Sale as DoctrineSale;
use Doctrine\ORM\EntityManager;

class MysqlSaleRepository implements SaleRepository
{
    /**
     * @var EntityManager
     */
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Sale $sale)
    {
        $this->entityManager->persist(DoctrineSale::fromSale($sale));
        $this->entityManager->flush();
    }
}
