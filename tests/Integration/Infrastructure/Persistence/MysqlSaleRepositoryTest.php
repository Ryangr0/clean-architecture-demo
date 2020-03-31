<?php

namespace CleanArchitecture\Tests\Integration\Infrastructure\Persistence;

use CleanArchitecture\Application\ServiceContainer;
use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use CleanArchitecture\Domain\Models\Product;
use CleanArchitecture\Domain\Models\Sale;
use Medoo\Medoo;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class MysqlSaleRepositoryTest extends TestCase
{
    public function test_sale_entity_is_persisted_with_the_correct_values()
    {
        $saleId = Uuid::uuid4();
        $customerId = Uuid::uuid4();
        $sale = new Sale(
            $saleId,
            $customerId,
            [new Product(Uuid::uuid4(), 'productName', 500)]
        );

        /** @var SaleRepository $salesRepository */
        $salesRepository = ServiceContainer::make(SaleRepository::class);
        $salesRepository->save($sale);

        $this->assertEquals(
            [
                [
                    'id' => $saleId->toString(),
                    'customer_id' => $customerId->toString(),
                    'subtotal' => "500.00",
                ]
            ],
            ServiceContainer::make(Medoo::class)->select(
                'sales',
                ['id', 'customer_id', 'subtotal'],
                ['id' => $saleId->toString(), 'customer_id' => $customerId->toString()]
            )
        );
    }
}
