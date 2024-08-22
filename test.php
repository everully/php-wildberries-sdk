<?php

declare(strict_types=1);

use Everully\PhpWildberriesSdk\Connectors\ContentWildberriesConnector;
use Everully\PhpWildberriesSdk\DataObjects\GetCardsRequestData;
use Everully\PhpWildberriesSdk\ValueObjects\Limit;

require __DIR__.'/vendor/autoload.php';

$token = 'eyJhbGciOiJFUzI1NiIsImtpZCI6IjIwMjQwODE5djEiLCJ0eXAiOiJKV1QifQ.eyJlbnQiOjEsImV4cCI6MTc0MDA4NDM2MiwiaWQiOiJlYWYxZTNhOC1lNWFhLTQxMjAtOWNmYi0zYWE5NjFkMGY1MDgiLCJpaWQiOjg0MzQ5NzEzLCJvaWQiOjUyMzc0MCwicyI6MCwic2lkIjoiNzI5NTQwZTAtMGI5YS00YTk0LThiNmYtNWU5ODY2NDVmZTc0IiwidCI6dHJ1ZSwidWlkIjo4NDM0OTcxM30.wdhZQE6j9DQ4B3Th5F891EUgHKBvHFJjW0POgp_qYLfURFNDnw1LxHYLFZQPKxWZMjgnIo4SxNcgBn2q6fdiXA';

$contentApi = new ContentWildberriesConnector($token, sandbox: true);

$data = GetCardsRequestData::from([
    'limit' => new Limit(100),
]);

$cards = $contentApi->cards()->get($data);

var_dump($cards);
