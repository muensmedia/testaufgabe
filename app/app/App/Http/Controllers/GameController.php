<?php

namespace App\Http\Controllers;

use Components\Enums\GameMark;
use Components\GameBoard\GameBoard;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class GameController extends Controller
{
    /**
     * @param int $x The x position entered by the player
     * @param int $y The y position entered by the player
     * @return Response
     */
    public function play(int $x, int $y) {

        // Loading the game board
        $game = GameBoard::load();

        // TODO TASK 3 - Let the player make their move
        // Here, you need to code the logic that allows a player to make a move.

        // Saving the game board and output it to the player
        $game->save();
        return response('GAME BOARD')->header('Content-Type', 'text/plain');
    }

    /**
     * The MÜNSMEDIA GmbH bot plays one turn
     * @return void
     */
    public function playBot()
    {
        // Load the current game board
        $gameBoard = GameBoard::load();

        // prevent infinite loop - is there still a free space on the game board?
        if ($gameBoard->spaceIsLeft()) {

            $freeSpaces = [];

            // get all rows of our game board
            foreach ($gameBoard->getRows() as $y => $row) {
                // get all spaces inside of the row
                foreach ($row->getSpaces() as $x => $space) {
                    // check whether the space is still free
                    if ($space->free()) {
                        // save the free space to our free spaces array
                        $freeSpaces[] = ['x' => $x, 'y' => $y];
                    }
                }
            }

            // get random free sapce from our array - https://laravel.com/docs/9.x/helpers#method-array-random
            $randomFreeSpaceXY = Arr::random($freeSpaces);

            // mark field with a circle
            $gameBoard->setSpace($randomFreeSpaceXY['x'], $randomFreeSpaceXY['y'], GameMark::Circle);

            // save changed game board
            $gameBoard->save();

            // todo: display board
        } else {
            // there is no more space left on the board
            abort(403, 'Bot is not allowed to play, game board has no space left.');
        }
    }
}
