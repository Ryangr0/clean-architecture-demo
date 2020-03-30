<?php

namespace CleanArchitecture\Domain\Models;

use CleanArchitecture\Domain\Exceptions\NegativeProductPriceException;

class Product
{
    private string $id;
    private string $name;
    private int $amountInCents;

    public function __construct(string $id, string $name, int $amountInCents)
    {
        if ($amountInCents < 0) {
            throw new NegativeProductPriceException(
                "Product '$name' has a negative price: '$amountInCents'."
            );
        }

        $this->id = $id;
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
