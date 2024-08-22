<?php

declare(strict_types=1);

it('should not contain debugging statements are left in our code.')
    ->expect(['var_dump', 'die', 'exit'])
    ->not->toBeUsed();
