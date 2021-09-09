<?php

declare(strict_types=1);

namespace App\Counters\Implementations;

use App\Counters\Counter;
use App\Counters\CounterType;

class BonusCounter extends Counter {
    private int $type = CounterType::MINUTES;

    public function getType(): int
    {
        return $this->type;
    }

    public function init()
    {
        // Запрашиваем внешние интеграции здесь
        $this->value = 10;
        $this->total = 20;
        $this->isFavourite = true;
    }
}