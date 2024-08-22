<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Resources;

use Everully\PhpWildberriesSdk\DataObjects\ApiToken;
use Everully\PhpWildberriesSdk\Requests\GetTokenRequest;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\BaseResource;

class TokensResource extends BaseResource
{
    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function get(string $token): ApiToken
    {
        return $this->connector->send(
            new GetTokenRequest($token)
        )->dtoOrFail();
    }
}
