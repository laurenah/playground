<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;
use Playground\Start\ThreeStart;

class ThreeStartTest extends TestCase
{
    #[Test]
    #[DataProvider('provideNumbersDivisibleByThree')]
    public function willReturnStartWhenMultipleOfThree(array $numbers): void
    {
        foreach ($numbers as $number) {
            $this->assertEquals('Start', (new ThreeStart())->run($number));
        }
    }

    #[Test]
    #[DataProvider('provideNumbersIndivisibleByThree')]
    public function willReturnNumberWhenNotDivisibleByThree(array $numbers): void
    {
        foreach ($numbers as $number) {
            $this->assertEquals($number, (new ThreeStart())->run($number));
        }
    }

    public static function provideNumbersDivisibleByThree(): array
    {
        return [[[3, 6, 9]]];
    }

    public static function provideNumbersIndivisibleByThree(): array
    {
        return [[[2, 4, 5]]];
    }
}
