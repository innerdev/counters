<?php

declare(strict_types=1);

namespace App\Counters;

use App\Counters\Implementations\AnotherCounter;
use App\Counters\Implementations\InternetCounter;
use Illuminate\Support\Collection;
use App\Counters\Implementations\BonusCounter;

class CountersRepository
{
    private Collection $countersClasses;

    // TODO В репозитории можно хранить уже созданные счетчики, чтобы при необходимости отдать их повторно, мы не дергали
    // инициализацию еще раз (а значит внешнии интеграции).
    private Collection $instantiatedCounters;

    public function __construct()
    {
        $this->countersClasses = new Collection();

        // Вот эта херня меня смущает как-то, нельзя ли это автоматизировать?
        $this->countersClasses->add(BonusCounter::class);
        $this->countersClasses->add(AnotherCounter::class);
        $this->countersClasses->add(InternetCounter::class);
    }

    public function getCountersByType(int $counterType): Collection
    {
        $counters = new Collection();
        foreach($this->countersClasses as $class) {
            $counter = new $class;
            if ($counter->getType() == $counterType) {
                $counter->init();
                $counters->add($counter);
            }
        }
        return $counters;
    }

    public function getByTypeFavouritesFirst(int $counterType): Collection
    {
        return $this->getCountersByType($counterType)->sortBy([
            fn ($a, $b) => $b->isFavourite() - $a->isFavourite(),
        ]);
    }
}