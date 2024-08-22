<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Requests;

use Everully\PhpWildberriesSdk\Concerns\Collection;
use Everully\PhpWildberriesSdk\Connectors\StatisticsWildberriesConnector;
use Everully\PhpWildberriesSdk\DataObjects\GetSalesStatisticsData;
use Everully\PhpWildberriesSdk\DataObjects\Sale;
use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Request\HasConnector;

class GetSalesStatisticsRequest extends Request implements HasBody
{
    use HasConnector;
    use HasJsonBody;

    protected string $connector = StatisticsWildberriesConnector::class;

    protected Method $method = Method::GET;

    public function __construct(public readonly GetSalesStatisticsData $data) {}

    public function resolveEndpoint(): string
    {
        return 'api/v1/supplier/sales';
    }

    protected function defaultQuery(): array
    {
        return [
            'dateFrom' => $this->data->date_from->format('Y-m-d\TH:i:s'),
            'flag' => $this->data->flag,
        ];
    }

    /**
     * @return Collection<Sale>
     *
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): Collection
    {
        return Collection::make(
            $response->json('cards'),
            fn (array $sale) => Sale::fromSaloon($sale)
        );
    }
}
