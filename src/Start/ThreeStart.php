<?php

declare(strict_types=1);

namespace Playground\Start;

/**
 * When a number is divisible by 3, return 'start', otherwise return the number
 */
class ThreeStart
{
    public function run(int $number): string|int
    {
        return ($number % 3) ? $number : 'Start';
    }
}
