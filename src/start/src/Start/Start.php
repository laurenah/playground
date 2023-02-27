<?php

declare(strict_types=1);

namespace Start;

/**
 * When a number is divisible by 3, return 'start', otherwise return the number
 */
class Start
{
    public function run(int $number): string|int
    {
        if ($number % 3) {
            return $number;
        }

        return 'start';
    }
}
