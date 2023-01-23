<?php

namespace Tests\Unit;

use Components\Enums\GameMark;
use Components\GameBoard\GameBoard;
use Tests\TestCase;

class GameControllerTest extends TestCase
{
    /**
     * Tests whether a space on the game board
     * that is already claimed cannot be claimed again
     * in the same round.
     *  1) A new game board is being initialized.
     *  2) A circle is placed in the middle of the game field.
     *  3) It is tested whether the middle of the game field
     *  can be claimed again using the corresponding route.
     *  A forbidden status code and the status text "This space has
     *  already been claimed!"
     * @dataProvider gameBoardCoordinatesProvider
     * @param int $x
     * @param int $y
     * @return void
     * @throws \Exception
     */
    public function testErrorSpaceIsClaimed(int $x, int $y): void
    {
        $gb = GameBoard::load();
        $gb->clear();
        $gb->setSpace($x, $y, GameMark::Circle);
        $gb->save();

        $response = $this->patch(route('play-api', ["x" => $x, "y" => $y]));

        $response->assertForbidden();
        $response->assertSeeText("This space has already been claimed!");
        $response->assertHeader("Content-Type");
        $this->assertStringContainsString("text/plain", $response->headers->get("Content-Type"));
    }

    /**
     * Tests whether a space on game board gets successfully claimed.
     * @dataProvider gameBoardCoordinatesProvider
     * @param int $x
     * @param int $y
     * @return void
     * @throws \Exception
     */
    public function testSpaceGetsClaimed(int $x, int $y): void
    {
        $gb = GameBoard::load();
        $gb->clear();
        $gb->save();

        $response = $this->patch(route('play-api', ["x" => $x, "y" => $y]));

        $response->assertOk();
        $gb = GameBoard::load();
        $this->assertEquals(GameMark::Circle, $gb->getSpace($x, $y));
    }

    public function gameBoardCoordinatesProvider(): array
    {
        $result = [];
        for ($x = 0; $x < GameBoard::TTT_SIZE; ++$x)
            for ($y = 0; $y < GameBoard::TTT_SIZE; ++$y)
                $result["x=" . $x . " y=" . $y] = [$x, $y];
        return $result;
    }
}
