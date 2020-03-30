<?php

use CleanArchitecture\Infrastructure\Persistence\Repositories\MysqlSaleRepository;
use PHPUnit\Framework\TestCase;

class MysqlSaleRepositoryTest extends TestCase
{
    public function test_that_the_sale_is_properly_inserted()
    {
        $repository = new MysqlSaleRepository();
    }
}
