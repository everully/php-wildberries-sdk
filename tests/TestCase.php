<?php

declare(strict_types=1);

namespace Everully\PhpWildberriesSdk\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Saloon\Config;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        Config::preventStrayRequests();

        parent::setUp();
    }
}
