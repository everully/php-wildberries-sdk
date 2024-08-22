<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\DataObjects;

use Carbon\Carbon;
use Everully\PhpWildberriesSdk\Collections\TokenScopesCollection;

class ApiToken
{
    public function __construct(
        public string $token_id,
        public TokenScopesCollection $scopes,
        public Carbon $expires_at,
        public bool $is_sandbox,
        public bool $deleted,
        public bool $expired,
    ) {}

    public static function fromSaloon(array $data): self
    {
        return new self(
            token_id: strval($data['Summary']['TokenId']),
            scopes: TokenScopesCollection::fromArray(
                $data['Summary']['ScopesDecoded'] ?? []
            ),
            expires_at: Carbon::parse($data['Summary']['ExpiresAt']), //todo Время передаётся в часовом поясе Мск (UTC+3).
            is_sandbox: boolval($data['Summary']['IsSandbox']),
            deleted: boolval($data['Summary']['Deleted']),
            expired: boolval($data['Summary']['Expired']),
        );
    }
}
