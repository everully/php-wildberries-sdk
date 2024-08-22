<?php

declare(strict_types=1);

use Everully\PhpWildberriesSdk\Resources\StatisticsResource;
use Everully\PhpWildberriesSdk\Resources\TokensResource;
use Everully\PhpWildberriesSdk\Wildberries;

it('resolves the base url')->expect(
    wildberries()->resolveBaseUrl()
)->toEqual('https://statistics-api.wildberries.ru');

it('resolves the sandbox url')->expect(
    wildberries(sandbox: true)->resolveBaseUrl()
)->toEqual('https://statistics-api-sandbox.wildberries.ru');

it('has a token')->expect(
    wildberries()->getToken()
)->toEqual('token');

it('sets a custom token', function () {
    // Arrange
    $connection = wildberries();

    // Act
    $connection->token('new-token');

    // Assert
    expect($connection)
        ->toBeInstanceOf(Wildberries::class)
        ->and($connection->getToken())
        ->toEqual('new-token');
});

test('sets the correct headers', function () {
    // Arrange
    $connection = wildberries();

    // Assert
    expect($connection->headers()->all())
        ->toBeArray()
        ->toMatchArray([
            'Content-Type' => 'application/json',
        ]);
});

it('has the tokens resource')
    ->expect(wildberries()->tokens())
    ->toBeInstanceOf(TokensResource::class)
    ->toHaveMethods(['get']);

it('has the statistics resource')
    ->expect(wildberries()->statistics())
    ->toHaveMethods(['sales'])
    ->toBeInstanceOf(StatisticsResource::class);
