<?php

namespace App\Http\Controllers;

use Components\Enums\GameMark;
use Components\Enums\GamePlayer;
use Components\GameBoard\GameBoard;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class GameController extends Controller
{

    protected function status_output( GameBoard $game ): Response {

        // Generate a status text for the end of the game.
        $winner = $this->whoHasWon( $game );
        if ( $this->someoneHasWon( $game ) && !$winner )
            $final = "\nSomeone has won the game!";
        elseif ( $this->someoneHasWon( $game ) && $winner === GamePlayer::Human)
            $final = "\nYou have won the game! Congratulations!";
        elseif ( $this->someoneHasWon( $game ) && $winner === GamePlayer::Robot)
            $final = "\nThe bot has won the game...";
        elseif ( !$game->spaceIsLeft() )
            $final = "\nIt's a draw!";
        else $final = '';

        return response("{$game->draw()}{$final}")->header('Content-Type', 'text/plain');
    }

    protected function someoneHasWon( GameBoard $game ): bool {
        // ##### TASK 4.1 - Check if someone has won ###################################################################
        // =============================================================================================================
        // Here, you need to code a check to determine if either the bot or the player has won the game.
        // A game counts as "won" if a row, column, the main diagonal or the anti-diagonal contains only the same marks.
        // You can make use of the $game->getRows, $game->getColumns, $game->getMainDiagonal and $game->getAntiDiagonal
        // functions.
        // This function needs to return false if nobody has won yet, and true f someone has
        // =============================================================================================================

        return false;
    }

    protected function whoHasWon( GameBoard $game ): ?GamePlayer {
        // ##### TASK 4.2 - Check who has won ##########################################################################
        // =============================================================================================================
        // Here, you need to code a way to find out who has won the game. You should already have completed task 4.1 at
        // this point.
        // This function needs to return null of nobody has won yet - you can use someoneHasWon( $game ) for this.
        // If someone has won, it needs to return either GamePlayer::Human or GamePlayer::Robot.
        // =============================================================================================================

        return null;
    }

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
        return $this->status_output( $game );
    }

    /**
     * The MÜNSMEDIA GmbH bot plays one turn
     * @return Response
     */
    public function playBot(): Response
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

            // get random free space from our array - https://laravel.com/docs/9.x/helpers#method-array-random
            $randomFreeSpaceXY = Arr::random($freeSpaces);

            // mark field with a circle
            $gameBoard->setSpace($randomFreeSpaceXY['x'], $randomFreeSpaceXY['y'], GameMark::Circle);

            // save changed game board
            $gameBoard->save();

            return $this->status_output( $gameBoard );
        } else {
            // there is no more space left on the board
            abort(403, 'Bot is not allowed to play, game board has no space left.');
        }
    }

    /**
     * Rests the board
     * @return Response
     */
    public function reset(): Response
    {
        // Load the current game board
        $gameBoard = GameBoard::load();
        $gameBoard->clear();
        $gameBoard->save();

        return $this->status_output( $gameBoard );
    }
}
