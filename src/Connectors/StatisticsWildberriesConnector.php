<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Connectors;

use Everully\PhpWildberriesSdk\Concerns\Collection;
use Everully\PhpWildberriesSdk\DataObjects\GetSalesStatisticsData;
use Everully\PhpWildberriesSdk\Requests\GetSalesStatisticsRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;

class StatisticsWildberriesConnector extends BaseWildberriesConnector
{
    public function resolveBaseUrl(): string
    {
        return $this->sandbox
            ? 'https://statistics-api-sandbox.wildberries.ru'
            : 'https://statistics-api.wildberries.ru';
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function sales(GetSalesStatisticsData $data): Collection
    {
        return $this->debug()->send(
            new GetSalesStatisticsRequest($data)
        )->dtoOrFail();
    }
}
