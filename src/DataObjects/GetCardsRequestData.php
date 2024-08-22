<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\DataObjects;

use Everully\PhpWildberriesSdk\Concerns\Data;
use Everully\PhpWildberriesSdk\ValueObjects\Limit;

class GetCardsRequestData extends Data
{
    public function __construct(
        public readonly Limit $limit = new Limit(100),
    ) {}
}
