<?php

declare(strict_types=1);

use Everully\PhpWildberriesSdk\Tests\TestCase;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
*/

uses(TestCase::class)->in('.');

uses()
    ->beforeEach(fn () => MockClient::destroyGlobal())
    ->in(__DIR__);

Config::preventStrayRequests();
