<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\DataObjects;

use Carbon\Carbon;
use Everully\PhpWildberriesSdk\Concerns\Data;

class GetSalesStatisticsData extends Data
{
    public function __construct(
        public readonly Carbon $date_from,
        public readonly int $flag = 0,
    ) {}
}
