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

        // Check if the given position is actually valid; can't have the player draw a cross on the table next to the
        // game board ;)
        if ($x < 0 || $x > 2 || $y < 0 || $y > 2)
            return response("Position outside of the game board")->setStatusCode(422)->header('Content-Type', 'text/plain');

        // ##### TASK 3 - Let the player make their move ###############################################################
        // =============================================================================================================
        // Here, you need to code the logic that allows a player to make a move.
        // You can make use of the methods offered by the $game object.
        // =============================================================================================================

        // TODO: Check if it's actually they player's turn
        // We don't want the player to be able to cheat. They should only be able to make a move if it is their turn.
        // Neither the player nor the bot are allowed to make a move twice in a row. So, you need to check which player
        // made the *last* move to find out if the player is allowed to act.
        // The method $game->getLastPlayer() will return either GamePlayer::Robot (the last move was made by the bot),
        // GamePlayer::Human (the last move was made by the player) or GamePlayer::None (this is the first move).
        // Afterwards, you will need to check if the space the player has selected is still open.
        // The method $game->getSpace( $x, $y ) will return the content of a space - either GameMark::None (free),
        // GameMark::Cross (belongs to the bot) or GameMark::Circle (belongs to the player).
        // Once all the checks have passed, you can finally update the game board by calling
        // $game->setSpace( $x, $y, GameMark::Circle ).

        // [ The code to check if the player is allowed to make a move goes here ]
        // If the player is not allowed to make a move, run the code in the line below by removing the //
        // return response("Don't cheat, it's not your turn yet!")->setStatusCode(403)->header('Content-Type', 'text/plain');

        // [ The code to check if the space is free goes here ]
        // If the space is not free, run the code in the line below by removing the //
        //return response("This space has already been claimed!")->setStatusCode(403)->header('Content-Type', 'text/plain');

        // [ The code to update the game board goes here ]

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
            foreach ($gameBoard->getRows() as $row) {
                // get all spaces inside of the row
                foreach ($row->getSpaces() as $space) {
                    // check whether the space is still free
                    if ($space->free()) {
                        // save the free space to our free spaces array
                        $freeSpaces[] = $space;
                    }
                }
            }

            // get random free sapce from our array - https://laravel.com/docs/9.x/helpers#method-array-random
            /* @var GameMark $randomFreeSpace */
            $randomFreeSpace = Arr::random($freeSpaces);
            // mark field with a circle
            $randomFreeSpace->player(GameMark::Circle);

            // save changed game board
            $gameBoard->save();

            // todo: display board
        } else {
            // there is no more space left on the board
            abort(403, 'Bot is not allowed to play, game board has no space left.');
        }

    }
}
