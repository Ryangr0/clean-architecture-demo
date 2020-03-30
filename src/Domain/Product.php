<?php

namespace CleanArchitecture\Domain;

use CleanArchitecture\Domain\Exceptions\NegativeProductPriceException;

class Product
{
    private string $name;
    private int $amountInCents;

    public function __construct(string $name, int $amountInCents)
    {
        if ($amountInCents < 0) {
            throw new NegativeProductPriceException(
                "Product '$name' has a negative price: '$amountInCents'."
            );
        }

        $this->name = $name;
        $this->amountInCents = $amountInCents;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function amountInCents(): int
    {
        return $this->amountInCents;
    }
}
