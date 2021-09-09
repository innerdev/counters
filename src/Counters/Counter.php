<?php

declare(strict_types=1);

namespace App\Counters;

abstract class Counter {
    protected ?int $value = null;
    protected ?int $total = null;
    protected ?bool $isFavourite = null;

    public abstract function init();

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function isFavourite(): bool
    {
        return $this->isFavourite;
    }
}