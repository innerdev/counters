<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\FeatureService;

$result = (new FeatureService())->process();
print_r ($result);