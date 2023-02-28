<?php

declare(strict_types=1);

namespace Tests\Start;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Playground\Start\ThreeStart;

class ThreeStartTest extends TestCase
{
    #[Test]
    #[DataProvider('provideNumbersDivisibleByThree')]
    public function willReturnStartWhenMultipleOfThree(int $number): void
    {
        $this->assertEquals('Start', (new ThreeStart())->run($number));
    }

    #[Test]
    #[DataProvider('provideNumbersIndivisibleByThree')]
    public function willReturnNumberWhenNotDivisibleByThree(int $number): void
    {
        $this->assertEquals($number, (new ThreeStart())->run($number));
    }

    public static function provideNumbersDivisibleByThree(): array
    {
        return [
            [3],
            [6],
            [9],
        ];
    }

    public static function provideNumbersIndivisibleByThree(): array
    {
        return [
            [2],
            [4],
            [5],
        ];
    }
}
