<?php

declare(strict_types=1);

namespace RockPaperScissors;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Playground\RockPaperScissors\RockPaperScissors;

class RockPaperScissorsTest extends TestCase
{
    private RockPaperScissors $engine;

    protected function setUp(): void
    {
        $this->engine = new RockPaperScissors();
    }

    #[Test, DataProvider('provideWinData')]
    public function willReturnWin($item, $opponentItem): void
    {
        $this->assertEquals('You win!', $this->engine->play($item, $opponentItem));
    }

    public static function provideWinData(): array
    {
        return [
            ['rock', 'scissors'],
            ['paper', 'rock'],
            ['scissors', 'paper'],
        ];
    }

    #[Test, DataProvider('provideLossData')]
    public function willReturnLoss($item, $opponentItem): void
    {
        $this->assertEquals('You lose!', $this->engine->play($item, $opponentItem));
    }

    public static function provideLossData(): array
    {
        return [
            ['scissors', 'rock'],
            ['paper', 'scissors'],
            ['rock', 'paper'],
        ];
    }

    #[Test]
    public function willReturnDrawWhenSameItems(): void
    {
        $this->assertEquals('Draw!', $this->engine->play('rock', 'rock'));
    }

    #[Test]
    public function willReturnExceptionWhenInvalidItemPlayed(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->engine->play('invalid');
    }

    #[Test]
    public function willReturnWhenPlayWithRandomOpponentItem(): void
    {
        $item = $this->engine->generateItem();
        $opponentItem = $this->engine->generateItem();

        $result = $this->engine->play($item, $opponentItem);

        if ($item === $opponentItem) {
            $this->assertEquals('Draw!', $result);
        } elseif (
            ($item === 'rock' && $opponentItem === 'scissors') ||
            ($item === 'paper' && $opponentItem === 'rock') ||
            ($item === 'scissors' && $opponentItem === 'paper')
        ) {
            $this->assertEquals('You win!', $result);
        } else {
            $this->assertEquals('You lose!', $result);
        }
    }
}
