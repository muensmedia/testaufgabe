<?php

namespace Components\GameBoard;

use Components\Enums\GameBoardSliceType;
use Components\Enums\GameMark;
use Exception;

class GameBoardSlice
{
    /**
     * @throws Exception
     */
    public function __construct(private readonly GameBoard $board, private readonly GameBoardSliceType $type, private readonly int $size, private readonly int $other = 0)
    {
        if ($this->size <= 0) throw new Exception("Board slice size must be at least 1.");
        if ($this->other < 0 || $this->other >= $this->size)
            throw new Exception("Board slice offset invalid.");
    }

    /**
     * Gets the content of a given space
     * @param int $p
     * @return GameMark
     * @throws Exception
     */
    public function getSpace( int $p ): GameMark {
        return match ($this->type) {
            GameBoardSliceType::Row => $this->board->getSpace( $p, $this->other ),
            GameBoardSliceType::Column => $this->board->getSpace( $this->other, $p ),
            GameBoardSliceType::MainDiagonal => $this->board->getSpace( $p, $p ),
            GameBoardSliceType::AntiDiagonal => $this->board->getSpace( $p, ($this->size - 1 ) - $p ),
        };
    }

    /**
     * Sets the content of a given space
     * @param int $p
     * @param GameMark $mark
     * @return void
     * @throws Exception
     */
    public function setSpace( int $p, GameMark $mark ): void {
        match ($this->type) {
            GameBoardSliceType::Row => $this->board->setSpace( $p, $this->other, $mark ),
            GameBoardSliceType::Column => $this->board->setSpace( $this->other, $p, $mark ),
            GameBoardSliceType::MainDiagonal => $this->board->setSpace( $p, $p, $mark ),
            GameBoardSliceType::AntiDiagonal => $this->board->setSpace( $p, $p - ($this->size - 1 ), $mark ),
        };
    }

    /**
     * Get all spaces inside an array, belonging to one row.
     * @return GameMark[]
     * @throws Exception
     */
    public function getSpaces(): array
    {
        $array = [];

        for ($i = 0; $i < $this->size; $i++) {
            $array[] = $this->getSpace($i);
        }
        return $array;
    }
}
