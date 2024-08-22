<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\ValueObjects;

use InvalidArgumentException;

readonly class Limit
{
    public int $value;

    public function __construct(int $limit)
    {
        if ($limit < 1 || $limit > 100) {
            throw new InvalidArgumentException('Limit must be between 1 and 000');
        }

        $this->value = $limit;
    }

    public static function make(int $limit): self
    {
        return new self($limit);
    }
}
