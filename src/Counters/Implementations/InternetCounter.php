<?php

declare(strict_types=1);

namespace App\Counters\Implementations;

use App\Counters\Counter;
use App\Counters\CounterType;

class InternetCounter extends Counter {
    private int $type = CounterType::INTERNET;

    public function getType(): int
    {
        return $this->type;
    }

    public function init()
    {
        // Запрашиваем внешние интеграции здесь
        $this->value = -1;
        $this->total = -2;
        $this->isFavourite = true;
    }
}