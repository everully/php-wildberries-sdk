<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Requests;

use Everully\PhpWildberriesSdk\Concerns\Collection;
use Everully\PhpWildberriesSdk\Connectors\ContentWildberriesConnector;
use Everully\PhpWildberriesSdk\DataObjects\Card;
use Everully\PhpWildberriesSdk\DataObjects\GetCardsRequestData;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Request\HasConnector;

class GetCardsRequest extends Request implements HasBody
{
    use HasConnector;
    use HasJsonBody;

    protected string $connector = ContentWildberriesConnector::class;

    protected Method $method = Method::POST;

    public function __construct(public readonly GetCardsRequestData $data) {}

    public function resolveEndpoint(): string
    {
        return 'content/v2/get/cards/list';
    }

    protected function defaultQuery(): array
    {
        return [
            'locale' => 'ru', //$this->connector->locale,
        ];
    }

    protected function defaultBody(): array
    {
        return [
            'settings' => [
                'sort' => [
                    'ascending' => false,
                ],
                'filter' => [
                    'withPhoto' => -1, //0 — только карточки без фото, 1 — только карточки с фото, -1 — все карточки товара
                    'textSearch' => '',
                    'tagIDs' => [],
                    'allowedCategoriesOnly' => false,
                    'objectIDs' => [],
                    'brands' => [],
                    'imtID' => 0,
                ],
                'cursor' => [
                    //                    'updatedAt' => '2023-12-06T11:17:00.96577Z',
                    'nmID' => 0,
                    'limit' => $this->data->limit->value,
                ],
            ],
        ];
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return Collection::make(
            $response->json('cards'),
            fn (array $card) => Card::fromSaloon($card)
        );
    }
}
