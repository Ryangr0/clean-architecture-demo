<?php

namespace CleanArchitecture\Tests\Domain\Models;

use CleanArchitecture\Domain\Exceptions\NegativeProductPriceException;
use CleanArchitecture\Domain\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_product_cannot_have_negative_pricing()
    {
        $this->expectException(NegativeProductPriceException::class);
        $this->expectExceptionMessage("Product 'productName' has a negative price: '-900'");
        new Product('productName', -900);
    }
}
