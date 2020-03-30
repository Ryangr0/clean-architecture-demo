<?php

namespace CleanArchitecture\Tests\Domain;

use CleanArchitecture\Domain\Sale;
use PHPUnit\Framework\TestCase;

class SaleTest extends TestCase
{
    public function test_can_be_instantiated()
    {
        $this->assertInstanceOf(Sale::class, new Sale);
    }
}
