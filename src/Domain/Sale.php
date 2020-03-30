<?php

namespace CleanArchitecture\Domain;

class Sale
{
    private string $customerId;

    /** @var Product[] */
    private array $products;

    public function __construct(string $customerId, array $products)
    {
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
