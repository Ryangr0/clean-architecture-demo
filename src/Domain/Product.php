<?php

namespace CleanArchitecture\Domain;

use Exception;

class Product
{
    private string $name;
    private int $amountInCents;

    public function __construct(string $name, int $amountInCents)
    {
        if ($amountInCents < 0) {
            throw new Exception('Price of the product cannot be less than 0.');
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
