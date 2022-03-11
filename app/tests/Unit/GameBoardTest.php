<?php

namespace Tests\Unit;

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
}
