<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Collections;

use Everully\PhpWildberriesSdk\Concerns\Collection;
use Everully\PhpWildberriesSdk\Enums\TokenScope;

/**
 * @extends TokenScopesCollection<int, TokenScope>
 */
class TokenScopesCollection extends Collection
{
    public static function fromArray(array $scopes): self
    {
        return new self(
            array_filter(
                array_map(
                    fn (string $scope) => TokenScope::tryFrom($scope),
                    $scopes
                )
            )
        );
    }
}
