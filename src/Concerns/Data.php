<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Concerns;

class Data
{
    public static function from(array $array = []): static
    {
        return new static(...$array);
    }
}
