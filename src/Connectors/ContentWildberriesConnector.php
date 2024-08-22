<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Connectors;

use Everully\PhpWildberriesSdk\Resources\CardsResource;

class ContentWildberriesConnector extends BaseWildberriesConnector
{
    public function resolveBaseUrl(): string
    {
        return $this->sandbox
            ? 'https://content-api-sandbox.wildberries.ru'
            : 'https://content-api.wildberries.ru';
    }

    public function cards(): CardsResource
    {
        return new CardsResource($this);
    }
}
