<?php

namespace CleanArchitecture\Domain\Models;

use CleanArchitecture\Domain\Exceptions\SaleHasNoProductsException;

class Sale
{
    private string $id;
    private string $customerId;

    /** @var Product[] */
    private array $products;

    public function __construct(string $id, string $customerId, array $products)
    {
        if (empty($products)) {
            throw new SaleHasNoProductsException("Sale for customerId '$customerId' has no products.");
        }

        $this->id = $id;
        $this->customerId = $customerId;
        $this->products = $products;
    }

    public function subTotal(): int
    {
        return array_reduce(
            $this->products,
            function ($sum, Product $product) {
                $sum += $product->amountInCents();
                return $sum;
            }
        );
    }
}
