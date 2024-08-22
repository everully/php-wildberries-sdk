<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Connectors;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

abstract class BaseWildberriesConnector extends Connector
{
    use AcceptsJson;
    use AlwaysThrowOnErrors;

    public function __construct(
        protected readonly string $token,
        protected readonly bool $sandbox = false,
    ) {}

    protected function defaultConfig(): array
    {
        return ['timeout' => 60 * 5];
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }
}
