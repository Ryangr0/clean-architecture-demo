<?php

namespace CleanArchitecture\Infrastructure\Persistence\Repositories;

use CleanArchitecture\Application\Usecases\Repositories\SaleRepository;
use CleanArchitecture\Domain\Models\Sale;
use Doctrine\ORM\EntityManager;
use Medoo\Medoo;

class MysqlSaleRepository implements SaleRepository
{
    /**
     * @var Medoo
     */
    private Medoo $mysql;

    public function __construct(Medoo $mysql)
    {
        $this->mysql = $mysql;
    }

    public function save(Sale $sale)
    {
        $this->mysql->insert(
            'sales',
            [
                'id' => $sale->id(),
                'customer_id' => $sale->customerId(),
                'subtotal' => $sale->subTotal(),
            ]
        );
    }
}
