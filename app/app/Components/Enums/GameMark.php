<?php

namespace Components\Enums;

enum GameMark
{
    case None;
    case Cross;
    case Circle;

    /**
     * Returns the player that has marked this spot, or null if the spot is free
     * @return GamePlayer|null
     */
    public function player(): ?GamePlayer
    {
        return match ($this) {
            self::Cross  => GamePlayer::Robot,
            self::Circle => GamePlayer::Human,
            default      => null
        };
    }

    /**
     * Returns true if the space is free
     * @return bool
     */
    public function free(): bool
    {
        return $this === self::None;
    }

    /**
     * Returns true if the spot is already marked
     * @return bool
     */
    public function marked(): bool
    {
        return !$this->free();
    }

    public function char(): string {
        return match ($this) {
            self::None   => '__',
            self::Cross  => '❌',
            self::Circle => '⭕'
        };
    }
}
