<?php

declare(strict_types=1);

namespace Start\tests;

use PHPUnit\Framework\TestCase;
use Start\Start;

class StartTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideNumbersDivisibleByThree
     */
    public function willReturnStartWhenMultipleOfThree(array $numbers): void
    {
        foreach ($numbers as $number) {
            $this->assertEquals('start', (new Start())->run($number));
        }
    }

    /**
     * @test
     * @dataProvider provideNumbersIndivisibleByThree
     */
    public function willReturnNumberWhenNotDivisibleByThree(array $numbers): void
    {
        foreach ($numbers as $number) {
            $this->assertEquals($number, (new Start())->run($number));
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
