<?php

namespace CleanArchitecture\Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Sale
{
    /** @ORM\Column(type="string") */
    private string $id;
    /** @ORM\Column(type="string") */
    private string $customerId;
    /** @ORM\Column(type="integer") */
    private int $subTotal;

    private function __construct(string $id, string $customerId, int $subTotal)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->subTotal = $subTotal;
    }

    public static function fromSale(\CleanArchitecture\Domain\Models\Sale $sale)
    {
        return new self(
            $sale->id(),
            $sale->customerId(),
            $sale->subTotal()
        );
    }
}
