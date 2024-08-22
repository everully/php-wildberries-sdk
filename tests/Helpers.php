<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

use Everully\PhpWildberriesSdk\Connectors\ContentWildberriesConnector;
use Everully\PhpWildberriesSdk\Requests\GetCardsRequest;
use Saloon\Http\Faking\Fixture;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;

/**
 * @param  array<class-string, Fixture>  $mocks
 */
function mockContentConnector(array $mocks = []): ContentWildberriesConnector
{
    //    $token = 'eyJhbGciOiJFUzI1NiIsImtpZCI6IjIwMjQwODE5djEiLCJ0eXAiOiJKV1QifQ.eyJlbnQiOjEsImV4cCI6MTc0MDA4NDM2MiwiaWQiOiJlYWYxZTNhOC1lNWFhLTQxMjAtOWNmYi0zYWE5NjFkMGY1MDgiLCJpaWQiOjg0MzQ5NzEzLCJvaWQiOjUyMzc0MCwicyI6MCwic2lkIjoiNzI5NTQwZTAtMGI5YS00YTk0LThiNmYtNWU5ODY2NDVmZTc0IiwidCI6dHJ1ZSwidWlkIjo4NDM0OTcxM30.wdhZQE6j9DQ4B3Th5F891EUgHKBvHFJjW0POgp_qYLfURFNDnw1LxHYLFZQPKxWZMjgnIo4SxNcgBn2q6fdiXA';

    $token = '';

    $mockClient = new MockClient([
        GetCardsRequest::class => MockResponse::fixture('content.cards.list'),
        ...$mocks,
    ]);

    $connector = new ContentWildberriesConnector($token, true);

    $connector->withMockClient($mockClient);

    return $connector;
}
