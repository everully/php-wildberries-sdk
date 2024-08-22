<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Requests;

use Everully\PhpWildberriesSdk\DataObjects\ApiToken;
use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Http\SoloRequest;

class GetTokenRequest extends SoloRequest
{
    protected Method $method = Method::GET;

    public function __construct(public readonly string $token) {}

    public function resolveEndpoint(): string
    {
        return 'https://common-api.wildberries.ru/open-utils/tokens/introspect-v2';
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'X-Introspect' => $this->token,
        ];
    }

    /**
     * @throws Exception
     */
    public function createDtoFromResponse(Response $response): ApiToken
    {
        $data = $response->json();

        if ( ! isset($data['Ok']) || ! isset($data['Found'])) {
            throw new Exception('Token is invalid.'); //todo: create custom exception
        }

        return ApiToken::fromSaloon($response->json());
    }
}
