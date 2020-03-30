<?php

use CleanArchitecture\Domain\Models\Sale;
use CleanArchitecture\Infrastructure\Persistence\Doctrine\Sale as DoctrineSale;
use CleanArchitecture\Infrastructure\Persistence\Repositories\MysqlSaleRepository;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\TestCase;

class MysqlSaleRepositoryTest extends TestCase
{
    public function test_sale_entity_is_persisted_with_the_correct_values()
    {
        $sale = $this->prophesize(Sale::class);
        $sale->id()->willReturn('id');
        $sale->customerId()->willReturn('customerId');
        $sale->subTotal()->willReturn(800);

        $entityManager = $this->prophesize(EntityManager::class);
        $entityManager->persist(DoctrineSale::fromSale($sale->reveal()))->shouldBeCalledOnce();
        $entityManager->flush()->shouldBeCalledOnce();

        $repository = new MysqlSaleRepository($entityManager->reveal());
        $repository->save($sale->reveal());
    }
}
