<?php

namespace CleanArchitecture\Tests\Domain\Models;

use CleanArchitecture\Domain\Models\Product;
use CleanArchitecture\Domain\Models\Sale;
use PHPUnit\Framework\TestCase;

class SaleTest extends TestCase
{
    public function test_sale_subtotal_must_equal_sum_of_product_pricing()
    {
        $sale = new Sale(
            'customerId',
            [
                new Product('productName', 500),
                new Product('productName', 1337),
                new Product('productName', 0),
            ]
        );

        $this->assertEquals(1837, $sale->subTotal());
    }
}
