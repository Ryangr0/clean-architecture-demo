<?php


namespace CleanArchitecture\Tests\Domain;


use CleanArchitecture\Domain\Product;
use Exception;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_product_cannot_have_negative_pricing()
    {
        $this->expectException(Exception::class);
        new Product('productName', -900);
    }
}
