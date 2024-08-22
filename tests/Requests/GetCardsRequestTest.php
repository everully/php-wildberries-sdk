<?php

declare(strict_types=1);

use Everully\PhpWildberriesSdk\Concerns\Collection;
use Everully\PhpWildberriesSdk\DataObjects\Card;
use Everully\PhpWildberriesSdk\DataObjects\GetCardsRequestData;
use Everully\PhpWildberriesSdk\Requests\GetCardsRequest;
use Everully\PhpWildberriesSdk\ValueObjects\Limit;

it('can get cards', function () {
    // Arrange
    $connector = mockContentConnector();
    $mockClient = $connector->getMockClient();

    $data = GetCardsRequestData::from([
        'limit' => new Limit(100),
    ]);

    // Act
    $cards = $connector->cards()->get($data);

    // Assert
    expect($cards)
        ->toBeInstanceOf(Collection::class)
        ->toContainOnlyInstancesOf(Card::class);

    $mockClient->assertSent(GetCardsRequest::class);
    $mockClient->assertSentCount(1);
});

test('a request sends the correct body', function () {
    // Arrange
    $connector = mockContentConnector();
    $mockClient = $connector->getMockClient();

    $data = GetCardsRequestData::from();

    // Act
    $connector->cards()->get($data);

    $mockClient->assertSent(GetCardsRequest::class);

    $mockClient->assertSent(
        fn (GetCardsRequest $request) => $request->body()->all() === [
            'settings' => [
                'sort' => [
                    'ascending' => false,
                ],
                'filter' => [
                    'withPhoto' => -1,
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
                    'limit' => 100,
                ],
            ],
        ]
    );
});
