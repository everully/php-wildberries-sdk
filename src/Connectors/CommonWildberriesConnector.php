<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Connectors;

use Everully\PhpWildberriesSdk\Resources\TokensResource;

class CommonWildberriesConnector extends BaseWildberriesConnector
{
    public function resolveBaseUrl(): string
    {
        return 'https://common-api.wildberries.ru';
    }

    public function tokens(): TokensResource
    {
        return new TokensResource($this);
    }
}
