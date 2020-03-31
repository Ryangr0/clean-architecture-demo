<?php

namespace CleanArchitecture\Tests\Unit\Domain\Models;

use CleanArchitecture\Domain\Exceptions\SaleHasNoProductsException;
use CleanArchitecture\Domain\Models\Product;
use CleanArchitecture\Domain\Models\Sale;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class SaleTest extends TestCase
{
    public function test_sale_must_have_at_least_one_product()
    {
        $this->expectException(SaleHasNoProductsException::class);
        $this->expectExceptionMessage("Sale for customerId 'customerId' has no products.");

        new Sale('id', 'customerId', []);
    }

    public function test_sale_subtotal_must_equal_sum_of_product_pricing()
    {
        $sale = new Sale(
            Uuid::uuid4(),
            Uuid::uuid4(),
            [
                new Product(Uuid::uuid4(), 'productName', 500),
                new Product(Uuid::uuid4(), 'productName', 1337),
                new Product(Uuid::uuid4(), 'productName', 0),
            ]
        );

        $this->assertEquals(1837, $sale->subTotal());
    }
}
