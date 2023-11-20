<?php

declare(strict_types=1);

namespace Playground\RockPaperScissors;

class RockPaperScissors
{
    public const ITEMS = [self::ROCK, self::PAPER, self::SCISSORS];

    public const ROCK = 'rock';
    public const PAPER = 'paper';
    public const SCISSORS = 'scissors';

    public function play(string $item, string $opponentItem = null): string
    {
        if (!in_array($item, self::ITEMS)) {
            throw new \InvalidArgumentException('Invalid item played');
        }

        if ($opponentItem === null) {
            $opponentItem = $this->generateItem();
        }

        if ($item === $opponentItem) {
            return 'Draw!';
        }

        if ($item === self::ROCK && $opponentItem === self::SCISSORS) {
            return 'You win!';
        }

        if ($item === self::PAPER && $opponentItem === self::ROCK) {
            return 'You win!';
        }

        if ($item === self::SCISSORS && $opponentItem === self::PAPER) {
            return 'You win!';
        }

        return 'You lose!';
    }

    public function generateItem(): string
    {
        return self::ITEMS[array_rand(self::ITEMS)];
    }
}
