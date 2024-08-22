<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Concerns;

use ArrayIterator;
use Closure;
use IteratorAggregate;

class Collection implements IteratorAggregate
{
    public function __construct(
        public array $items,
    ) {}

    public function toArray(): array
    {
        return $this->items;
    }

    public static function make(array $items, ?Closure $closure = null): static
    {
        return new static(
            $closure ? array_map($closure, $items) : $items
        );
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}
