<?php

namespace Tests\Unit;

use Components\Enums\GameMark;
use Components\GameBoard\GameBoard;
use Tests\TestCase;

class GameBoardTest extends TestCase
{
    public function test_new_gameboard_should_be_empty()
    {
        $gb = GameBoard::load();

        for ($x = 0; $x < 3; ++$x)
            for ($y = 0; $y < 3; ++$y)
                $this->assertTrue( $gb->getSpace($x,$y)->free() );
    }

    public function test_gameboard_should_fill()
    {
        $gb = GameBoard::load();

        for ($x = 0; $x < 3; ++$x)
            for ($y = 0; $y < 3; ++$y)
                $gb->setSpace( $x, $y, match (($x + $y) % 3) {
                    0 => GameMark::None,
                    1 => GameMark::Circle,
                    2 => GameMark::Cross,
                }  );

        for ($x = 0; $x < 3; ++$x)
            for ($y = 0; $y < 3; ++$y)
                $this->assertSame( match (($x + $y) % 3) {
                    0 => GameMark::None,
                    1 => GameMark::Circle,
                    2 => GameMark::Cross,
                }, $gb->getSpace( $x, $y ) );
    }

    public function test_gameboard_slices()
    {
        $gb = GameBoard::load();

        for ($x = 0; $x < 3; ++$x)
            for ($y = 0; $y < 3; ++$y)
                $gb->setSpace( $x, $y, match ($x) {
                    0 => GameMark::None,
                    1 => GameMark::Circle,
                    2 => GameMark::Cross,
                }  );

        for ($y = 0; $y < 3; ++$y) {
            $row = $gb->getRow( $y );
            for ($x = 0; $x < 3; ++$x) $this->assertSame( match ($x) {
                0 => GameMark::None,
                1 => GameMark::Circle,
                2 => GameMark::Cross,
            }, $row->getSpace( $x ) );
        }

        for ($x = 0; $x < 3; ++$x) {
            $col = $gb->getColumn( $x );
            for ($y = 0; $y < 3; ++$y) $this->assertSame( match ($x) {
                0 => GameMark::None,
                1 => GameMark::Circle,
                2 => GameMark::Cross,
            }, $col->getSpace( $y ) );
        }
    }
}
