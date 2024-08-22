<?php

declare(strict_types=1);

use Carbon\Carbon;
use Everully\PhpWildberriesSdk\DataObjects\GetSalesStatisticsData;

it('can get all statistics', function () {
    // Arrange
    $data = GetSalesStatisticsData::from([
        'date_from' => Carbon::now(),
        'flag' => 0,
    ]);

    dd($data);

    // Act
    $response = wildberries()->statistics()->sales($data);

    //    $data = $response->json();

    expect($response)->toBeArray();

    $this->mockClient->assertSent(GetAnnouncementsRequest::class);
});
