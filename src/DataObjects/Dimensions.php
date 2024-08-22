<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\DataObjects;

use Everully\PhpWildberriesSdk\Concerns\Data;

class Dimensions extends Data
{
    public function __construct(
        public readonly int $length,
        public readonly int $width,
        public readonly int $height,
    ) {}

    public static function fromSaloon(array $response): self
    {
        return new self(
            length: intval($response['length']),
            width: intval($response['width']),
            height: intval($response['height']),
        );
    }
}
