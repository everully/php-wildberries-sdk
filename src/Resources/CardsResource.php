<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Resources;

use Everully\PhpWildberriesSdk\Concerns\Collection;
use Everully\PhpWildberriesSdk\DataObjects\Card;
use Everully\PhpWildberriesSdk\DataObjects\GetCardsRequestData;
use Everully\PhpWildberriesSdk\Requests\GetCardsRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;

class CardsResource extends BaseResource
{
    /**
     * @return Collection<Card>
     *
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function get(GetCardsRequestData $payload): Collection
    {
        return $this->connector->send(
            new GetCardsRequest($payload)
        )->dtoOrFail();
    }
}
